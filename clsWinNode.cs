using System;
using System.Data;
using System.Configuration;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;
using System.Collections.Generic;
namespace WebApplication1
{
    public class clsWinNode
    {
        private clsWinNode ndParent;
        public clsWinNode ParentNode
        {
            get { return ndParent; } 
        }

        private List<clsWinNode> lndChildren;

        private enWin winType;
        public enWin WinType
        {
            get { return winType; }
        }

        private int iBalance;
        public int Balance
        {
            get { return iBalance; }
        }

        private int iBetAmount;
        public int BetAmount
        {
            get { return iBetAmount; }
        }

        public clsWinNode(enWin _winType, clsWinNode _ndParent, int _iBalance, int _iBetAmount)
        {
            winType = _winType;
            ndParent = _ndParent;
            iBalance = _iBalance;
            iBetAmount = _iBetAmount;
            lndChildren = new List<clsWinNode>(Enum.GetValues(typeof(enWin)).Length);
        }

        public clsWinNode ndfnAddChild(enWin _winType)
        {
            clsWinNode ndChild = new clsWinNode(_winType, this, iBalance + (iBetAmount * (int)_winType), iBetAmount);
            lndChildren.Insert(0, ndChild);

            return ndChild;
        }
    }

    public class clsWinTree
    {
        private clsWinNode ndRoot;
        public clsWinNode RootNode
        {
            //return wintype which gets closest to the target balance
            get
            {
                if (iTargetBalance < iInitialBalance)
                {
                    return new clsWinNode(enWin.Loss, null, iInitialBalance, iBetAmount);
                }
                else
                {
                    int iDiff = iTargetBalance - iInitialBalance;
                    if (iDiff >= (int)enWin.ThreeToOne*iBetAmount)
                    {
                        return new clsWinNode(enWin.ThreeToOne, null, iInitialBalance, iBetAmount);
                    }

                    if (iDiff >= (int)enWin.TwoToOne*iBetAmount)
                    {
                        return new clsWinNode(enWin.TwoToOne, null, iInitialBalance, iBetAmount);
                    }
                    
                    return new clsWinNode(enWin.OneToOne, null, iInitialBalance, iBetAmount);
                }
            }
        }

        private clsWinNode ndClosest;

        private int iNumBetsRemaining, iTargetBalance, iMinBet, iMaxBet, iNumTargetLeafNodes, iRandomMargin, iInitialBalance, iBetAmount;

        private Random rnd;

        private int iNoWinTypes = Enum.GetValues(typeof(enWin)).GetLength(0);

        private List<clsWinNode> lndHitTargetLeafNodes, lndWinSequence;

        public List<clsWinNode> WinSequence
        {
            get 
            {
                lndWinSequence = new List<clsWinNode>();

                clsWinNode ndStartLeaf = lndHitTargetLeafNodes.Count > 0 ? lndHitTargetLeafNodes[ new Random().Next(lndHitTargetLeafNodes.Count - 1)] : ndClosest;

                fnTraverseWinSequence(ndStartLeaf, lndWinSequence);

                return lndWinSequence;
            }
        }

        public clsWinTree(int _iInitialBalance, int _iNumBetsRemaining, int _iBetAmount, int _iTargetBalance)
        {
            iInitialBalance = _iInitialBalance;

            iBetAmount = _iBetAmount;

            rnd = new Random();

            iNumBetsRemaining = _iNumBetsRemaining;

            iTargetBalance = _iTargetBalance;

            lndHitTargetLeafNodes = new List<clsWinNode>();

            ndClosest = new clsWinNode(enWin.Loss, null, -1000, 0);

            iMinBet = int.Parse(ConfigurationManager.AppSettings["MinBet"]);

            iMaxBet = int.Parse(ConfigurationManager.AppSettings["MaxBet"]);

            iNumTargetLeafNodes = int.Parse(ConfigurationManager.AppSettings["NumTargetLeafNodes"]);

            Array aWins = Enum.GetValues(typeof(enWin));
            int iWin = (int)aWins.GetValue(aWins.Length - 2);
            iRandomMargin = Math.Abs(_iInitialBalance - _iTargetBalance) + iWin*iMaxBet; //int.Parse(ConfigurationManager.AppSettings["iRandomMargin"]);

        }


        private enWin enfnRandomEnum()
        {
            enWin[] values = (enWin[])Enum.GetValues(typeof(enWin));
            int i = rnd.Next(0, values.Length);

            return values[i];
        }

        public void fnGenerateRandomTree(clsWinNode _ndParent, int _iNumBetsRemaining)
        {
            if (_iNumBetsRemaining < 0)
            {
                lndHitTargetLeafNodes.Insert(0, _ndParent);

                return;
            }
           
            int iChildBalance;
            enWin winType;

            do
            {
                winType = enfnRandomEnum();
                iChildBalance = _ndParent.Balance + (_ndParent.BetAmount * (int)winType);

            } while (_iNumBetsRemaining > 0 && Math.Abs(iChildBalance - iTargetBalance) >= iRandomMargin); // ==== TWEAK ME!!! i'm dying

            clsWinNode ndChild = _ndParent.ndfnAddChild(winType);

            fnGenerateRandomTree(ndChild, --_iNumBetsRemaining);
        }

        public void fnGenerateTree(clsWinNode _ndParent, int _iNumBetsRemaining)
        {
            if (lndHitTargetLeafNodes.Count >= iNumTargetLeafNodes || Math.Abs(ndClosest.Balance - iTargetBalance) <= iMinBet)
            {
                return;
            }

            if (_iNumBetsRemaining < 0)
            {
                if ((_ndParent.Balance == iTargetBalance))
                {
                    lndHitTargetLeafNodes.Insert(0, _ndParent);
                }
                else if (Math.Abs(_ndParent.Balance - iTargetBalance) < Math.Abs(ndClosest.Balance - iTargetBalance))
                {
                    ndClosest = _ndParent;
                }

                return;
            }

            _iNumBetsRemaining--;

            int i = rnd.Next(0, iNoWinTypes);

            for (int j = i + iNoWinTypes; j <= (i + 2*iNoWinTypes - 1); j++)
            {
                int k = j % iNoWinTypes == 0 ? -1 : j % iNoWinTypes;

                clsWinNode ndChild = _ndParent.ndfnAddChild((enWin)k);

                if (lndHitTargetLeafNodes.Count > 0 && (Math.Abs(ndChild.Balance - iTargetBalance) > _iNumBetsRemaining * iMinBet)) // --------------------------- CHECK THIS (distance from tgtbal)
                {
                    return;
                }

                fnGenerateTree(ndChild, _iNumBetsRemaining);
            }
        }

        private void fnTraverseWinSequence(clsWinNode _ndChild, List<clsWinNode> _lndWinSequence)
        {
            if (_ndChild == null)
            {
                return; 
            }

            _lndWinSequence.Insert(0, _ndChild);

            fnTraverseWinSequence(_ndChild.ParentNode, _lndWinSequence);
        }
    }
}
