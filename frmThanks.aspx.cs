using System;
using System.Collections;
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
using System.IO;

namespace WebApplication1
{
    public partial class frmThanks : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            lock (this)
            {
                string sFilePath = AppDomain.CurrentDomain.BaseDirectory + "data\\data.csv";

                using (FileStream fs = new FileStream(sFilePath, FileMode.OpenOrCreate))
                {
                    using (StreamWriter sw = new StreamWriter(fs))
                    {
                        string s;

                        // if the file is empty we need to add the column headings
                        if (fs.Length == 0)
                        {
                            s = "Number,Date,Time";

                            foreach (string sKey in Request.Form.AllKeys)
                            {
                                if (sKey != "Submit")
                                    s += "," + sKey;
                            }

                            sw.WriteLine(s);
                        }
                        else
                        {
                            fs.Seek(fs.Length, 0);
                        }

                        s = string.Format("#,{0},{1}", DateTime.Now.ToString("dd/MM/yyyy"), DateTime.Now.ToString("HH:mm:ss"));

                        foreach (string sKey in Request.Form.AllKeys)
                        {
                            if (sKey != "Submit")
                            {
                                s += "," + Request.Form.Get(sKey).Replace(Environment.NewLine, "");
                            }
                        }

                        sw.WriteLine(s);
                    }
                }
            }
        }
    }
}
