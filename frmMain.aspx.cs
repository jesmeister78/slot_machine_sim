using System;
using System.Collections;
using System.Collections.Specialized;
using System.Configuration;
using System.Data;
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
    public partial class _Default : System.Web.UI.Page
    {
        private int icNumBets;

        protected void Page_Load(object sender, EventArgs e)
        {
            if (!IsPostBack || hfReset.Value == "1")
            {
                
                if (hfReset.Value == "1")
                {
                    string sRound = Request.QueryString["d"];
                    string sRedirect = ConfigurationManager.AppSettings[string.Format("RedirectURL_{0}", sRound)] + sfnEncrypt(hfBalance.Value);
                    //fnPostData(sRedirect);
                    //Response.Redirect(sRedirect);

                    HttpHelper.RedirectAndPOST(this, sRedirect, (NameValueCollection)Session["Inputs"]);

                    // -- Reset rather than redirect --
                    //hfNoSpin.Value = "0";
                    //hfLastBet.Value = "-1";
                    //lblBalance.Enabled = true;
                    //lblPayout.Enabled = true;
                    //lblPayout.Text = string.Empty;
                    //imgbtnReset.ImageUrl = "~/images/Reset_Off.gif";
                    //imgbtnReset.Enabled = false;
                    //hfReset.Value = "0";
                }
                else
                {
                    // write form values that have been posted to this form from php page
                    fnWritePostValsToSession();

                    fnChoosePic(td0, 1);
                    fnChoosePic(td1, 1);
                    fnChoosePic(td2, 1);

                    hfBalance.Value = sfnDecrypt(Request.QueryString["a"]);
                    tblMain.Disabled = true;
                    btnSpin.Enabled = true;
                    lblBet.Enabled = true;
                    divMain.Visible = true;
                    divLink.Visible = false;
                    lblBetsRemaining.Text = sfnDecrypt(Request.QueryString["b"]);

                }
            }
            else
            {
                icNumBets = int.Parse(sfnDecrypt(Request.QueryString["b"])); 

                if (int.Parse(hfNoSpin.Value) > icNumBets)
                {
                    tblMain.Disabled = true;
                    btnSpin.Enabled = false;
                    lblBet.Enabled = false;
                    imgBetMax.Attributes.Remove("onclick");
                    imgBetMin.Attributes.Remove("onclick");
                    lblBalance.Enabled = false;
                    lblPayout.Enabled = false;
                    imgbtnReset.ImageUrl = "~/images/Reset_On.gif";
                    imgbtnReset.Attributes.Add("onclick", "fnReset()");
                    imgbtnReset.Enabled = true;
                   
                }
                else
                {
                    tblMain.Disabled = false;
                    btnSpin.Enabled = true;
                    lblBet.Enabled = true;

                    lblBetsRemaining.Text = (icNumBets - int.Parse(hfNoSpin.Value)).ToString();
                    divMain.Visible = true;
                    divLink.Visible = false;
                }
            }

            lblBalance.Text = hfBalance.Value;

            btnSpin.Attributes.Add("onclick", string.Format("if(!fnCheckBet(document.getElementById('{0}'))){{ return false; }}else{{ document.getElementById('{1}').value ++; fnClickPic();}}", lblBet.ClientID, hfNoSpin.ClientID));
        }

        private void fnWritePostValsToSession()
        {
            NameValueCollection nvInputs = new NameValueCollection();

            foreach (string sKey in Request.Form.AllKeys)
            {
                if (!sKey.Contains("Submit"))
                {
                    nvInputs.Add(sKey, Request.Form.Get(sKey));
                }
            }

            Session["Inputs"] = nvInputs;
        }

        private void fnPostData( string _sPostURL)
        {
            string sRound = Request.QueryString["d"];
            clsPostSubmitter post = new clsPostSubmitter();
            post.Url = _sPostURL;
            //post.Url = sPostURL.Substring(0, sPostURL.IndexOf('?'));
            post.PostItems.Add((NameValueCollection)Session["Inputs"]);
            post.Type = clsPostSubmitter.PostTypeEnum.Post;
            string result = post.Post();
        }

        protected void Page_Init(object sender, EventArgs e)
        {

            HtmlLink css = new HtmlLink();
            css.Href = (Request.Browser.Browser == "IE") ? "~/SlotStyleIE.css" : "~/SlotStyleNotIE.css";
            css.Attributes["rel"] = "stylesheet";
            css.Attributes["type"] = "text/css";
            css.Attributes["media"] = "all";
            Page.Header.Controls.Add(css);

        }

        protected override void OnPreRender(EventArgs e)
        {
            lblBet.Text = hfLastBet.Value == "-1" ? hfThisBet.Value : hfLastBet.Value;
            lblBet.Style.Add("text-align", "center");
            lblBet.Style.Add("font-size", "larger");
            lblBet.Style.Add("font-weight", "bold");
            lblBet.Style.Add("color", "#FF0000");
            lblBet.Style.Add("font-family", "Tahoma");

            if (Request.Browser.Browser == "IE")
            {
                Label1.Height = 25;
                lblBetsRemaining.Height = 25;
            }

            if (lblBetsRemaining.Text == "0")
            {
                tblMain.Disabled = true;
                btnSpin.Enabled = false;
                lblBet.Enabled = false;
                imgBetMax.Attributes.Remove("onclick");
                imgBetMin.Attributes.Remove("onclick");
                lblBalance.Enabled = false;
                lblPayout.Enabled = false;
                imgbtnReset.ImageUrl = "~/images/Reset_On.gif";
                imgbtnReset.Attributes.Add("onclick", string.Format("document.getElementById('{0}').value = '1';", hfReset.ClientID));
                imgbtnReset.Enabled = true; 
                divLink.Visible = true;
                divLink.Style.Add("display", "block");

            }
        }

        protected override void Render(HtmlTextWriter writer)
        {
            if (Request.Browser.Browser != "IE")
            {
                lblBet.Style.Add("width", "86px");
                lblBet.Style.Add("white-space", "normal");
            }
            
           
            
            base.Render(writer);
        }
       
        private void fnChoosePic(Control _td, int _iShow)
        {
            foreach (Control ctrl in _td.Controls)
            {
                if (ctrl is WebControl)
                {
                    string sDisplay = ctrl.ClientID.EndsWith(_iShow.ToString()) ? "block" : "none";
                    ((WebControl)ctrl).Style.Add("display", sDisplay);
                }
            }
        }

        public string sfnEncrypt(string _sVal)
        {
            return HttpUtility.UrlEncode(Convert.ToBase64String(str2ByteArray(_sVal)));
        }

        public static byte[] str2ByteArray(string _sInput)
        {
            return new System.Text.UTF8Encoding().GetBytes(_sInput);
        }

        public string sfnDecrypt(string _sEncVal)
        {
            try
            {
                return bytearray2str(Convert.FromBase64String(HttpUtility.UrlDecode(_sEncVal)));
            }
            catch (Exception e)
            {
                return "";
            }
        }

        private string bytearray2str(byte[] _baInput)
        {
            return new System.Text.UTF8Encoding().GetString(_baInput);
        }

        // Hit the Spin button
        protected void ImageButton1_Click(object sender, ImageClickEventArgs e)
        {
            if (int.Parse(hfNoSpin.Value) >= 0)
            {
                clsBankRoll clsBankRoll = new clsBankRoll(int.Parse(hfBalance.Value));
                double dWinRate;
                double.TryParse(sfnDecrypt(Request.QueryString["c"]), out dWinRate);
                int iNoNonRandom = int.Parse(ConfigurationManager.AppSettings["NoNonRandom"]);
                string sInitBal = sfnDecrypt(Request.QueryString["a"]);
                clsWinGenerator clsWinGen = new clsWinGenerator(Enum.GetNames(typeof(enPic)).Length, int.Parse(sInitBal), dWinRate);
                int iBet, iLastBet = int.Parse(hfLastBet.Value), iBetsRemaining = int.Parse(sfnDecrypt(Request.QueryString["b"])) - (int.Parse(hfNoSpin.Value));
                bool bRandom = iBetsRemaining > iNoNonRandom;

                if (int.TryParse(hfThisBet.Value, out iBet))
                {
                    List<clsWinNode> lndWinSeq;
                    int[] iaResult;

                    // if first bet or diff to last or the first non-random bet -> generate list of future outcomes
                    if (iBet != iLastBet || iBetsRemaining == iNoNonRandom)
                    {
                        // generate seq of win types for num bets remaining at this bet amount
                        lndWinSeq = clsWinGen.wtfnGenerateWinSequence(iBet, iBetsRemaining, clsBankRoll.Balance, clsWinGen.TargetBalance, bRandom);
                    }
                    else // if last bet same as this bet then get list from session 
                    {
                        if (Session["lndWinSeq"] != null)
                        {
                            lndWinSeq = (List<clsWinNode>)Session["lndWinSeq"];
                        }
                        else
                        {
                            // generate seq of win types for num bets remaining at this bet amount
                            lndWinSeq = clsWinGen.wtfnGenerateWinSequence(iBet, iBetsRemaining, clsBankRoll.Balance, clsWinGen.TargetBalance, bRandom);
                        }
                    }

                    //translate the first one in the list
                    iaResult = clsWinGen.iafnTranslateWin(lndWinSeq[0].WinType);

                    //adjust the balance
                    if (clsBankRoll.bfnBet(iBet, lndWinSeq[0].WinType))
                    {
                        lblBalance.Text = hfBalance.Value = clsBankRoll.Balance.ToString();
                        lblPayout.Text = clsWinGen.Payout[lndWinSeq[0].WinType];
                    }
                    else
                    {
                        // set error somewhere!?
                    }

                    //remove the first win sequence
                    lndWinSeq.RemoveAt(0);

                    //store remaining list to session
                    Session["lndWinSeq"] = lndWinSeq;

                    // update the 'last bet' to this new one
                    hfLastBet.Value = iBet.ToString();

                    // draw the pictures
                    fnChoosePic(td0, iaResult[0]);
                    fnChoosePic(td1, iaResult[1]);
                    fnChoosePic(td2, iaResult[2]);
                }
            }
            else
            {
                // show warning n end
            }
        }
    }
}
