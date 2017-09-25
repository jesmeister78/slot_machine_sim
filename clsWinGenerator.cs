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
    public enum enWin
    {
        Loss = -1,
        OneToOne = 1,
        TwoToOne = 2,
        ThreeToOne = 3
    }

    public enum enPic
    {
        Chip = 0,
        Clover = 1,
        Crown = 2,
        Diamond = 3,
        Grapes = 4,
        Horseshoe = 5,
        Pear = 6,
        Star = 7,
        Strawberry = 8
    }

    public class clsWinGenerator
    {
        #region properties

        private Dictionary<enWin, string> dictWin = new Dictionary<enWin, string>()
        {
            {enWin.Loss, ConfigurationManager.AppSettings["LossDisplay"]},
            {enWin.OneToOne, ConfigurationManager.AppSettings["OneToOneDisplay"]},
            {enWin.TwoToOne, ConfigurationManager.AppSettings["TwoToOneDisplay"]},
            {enWin.ThreeToOne, ConfigurationManager.AppSettings["ThreeToOneDisplay"]}
        };

        public Dictionary<enWin, string> Payout
        {
            get { return dictWin; }
        }
        
        private int iNumSymbols;
        public int NumSymbols
        {
            get { return iNumSymbols; }
            set { iNumSymbols = value; }
        }

        private double dWinRate;

        private int iTargetBalance;
        public int TargetBalance
        {
            get { return iTargetBalance; }
        }

        private int iBetAmount;
        public int BetAmount
        {
            set { iBetAmount = value; }
        }

        private int iNumBets;
        public int NumBets
        {
            set { iNumBets = value; }
        }

        private int iInitialBalance;

        public int[] RandomSequence
        {
            get
            {
                Random random = new Random();

                return new int[] { random.Next(iNumSymbols), random.Next(iNumSymbols), random.Next(iNumSymbols) };
            }
        }
        #endregion

        #region Constructor

        public clsWinGenerator(int _iNumSymbols, int _iInitialBalance, double _dWinRate)
        {
            iNumSymbols = _iNumSymbols;

            dWinRate = _dWinRate;

            iInitialBalance = _iInitialBalance;

            iTargetBalance = iInitialBalance + ((int)dWinRate * iInitialBalance / 100);
        }

        #endregion

        public int[] iafnGenerateSequence(bool _bIsReset)
        {
            if (_bIsReset)
            {
                return new int[] { 0, 0, 0 };
            }

            Random random = new Random();

            return new int[] { random.Next(iNumSymbols), random.Next(iNumSymbols), random.Next(iNumSymbols) };
        }

        public List<clsWinNode> wtfnGenerateWinSequence(int _iBetAmount, int _iBetsRemaining, int _iCurrentBalance, int _iTargetBalance, bool _bRandom)
        {
            clsWinTree winTree = new clsWinTree(_iCurrentBalance, _iBetsRemaining, _iBetAmount, _iTargetBalance);

            if (_bRandom)
            {
                winTree.fnGenerateRandomTree(winTree.RootNode, _iBetsRemaining);
            }
            else
            {
                winTree.fnGenerateTree(winTree.RootNode, _iBetsRemaining);
            }

            List<clsWinNode> lndWinSequence = winTree.WinSequence;

            return lndWinSequence;
        }



        /// <summary>
        /// Chooses an array of ints (which correspond to pictures) for a particular win type
        /// </summary>
        /// <param name="_winType"></param>
        /// <returns></returns>
        public int[] iafnTranslateWin(enWin _winType)
        {
            int[] iaSeq = new int[3];
            Random rndGenerator = new Random();

            // choose indexes randomly 
            int a = rndGenerator.Next(0, 2), b = (3 - a) % 2, c = 3 - (a + b);

            int iNumPics = Enum.GetValues(typeof(enPic)).Length - 1;

            switch (_winType)
            {
                case enWin.Loss:

                    iaSeq[a] = rndGenerator.Next(0, iNumPics);

                    do{
                        iaSeq[b] = rndGenerator.Next(0, iNumPics);
                    } 
                    while (iaSeq[b] == iaSeq[a]);

                    do{
                        iaSeq[c] = rndGenerator.Next(0, iNumPics);
                    } 
                    while (iaSeq[c] == iaSeq[a] || iaSeq[c] == iaSeq[b]);

                    break;

                case enWin.OneToOne:

                    do{
                        iaSeq[a] = iaSeq[b] = rndGenerator.Next(0, iNumPics);
                    } 
                    while ((int)enPic.Diamond == iaSeq[a] || (int)enPic.Crown == iaSeq[a]);

                    do{
                        iaSeq[c] = rndGenerator.Next(0, iNumPics);
                    } 
                    while (iaSeq[c] == iaSeq[a]);

                    break;

                case enWin.TwoToOne:

                    do{
                        iaSeq[a] = iaSeq[b] = rndGenerator.Next(0, iNumPics);
                    } 
                    while ((int)enPic.Diamond == iaSeq[a] || (int)enPic.Crown == iaSeq[a]);

                    do{
                        iaSeq[c] = rndGenerator.Next(0, 1) == 0 ? (int)enPic.Diamond : (int)enPic.Crown;
                    } 
                    while (iaSeq[c] == iaSeq[a]);

                    break;

                case enWin.ThreeToOne:

                    iaSeq[a] = iaSeq[b] = iaSeq[c] = rndGenerator.Next(0, iNumPics);

                    break;

                default:
                    break;
            }

            return iaSeq;
        }
    }
}
