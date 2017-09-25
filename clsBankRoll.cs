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

namespace WebApplication1
{
    public class clsBankRoll
    {
        private int iBalance;

        public int Balance
        {
            get { return iBalance; }
        }

        public clsBankRoll(int _iInitialBalance)
        {
            iBalance = _iInitialBalance;
        }

        public bool bfnBet(int _iBetAmount, enWin _winType)
        {
            if (_iBetAmount <= iBalance)
            {
                iBalance += (int)_winType * _iBetAmount;
                return true;
            }

            return false;
        }
    }
}
