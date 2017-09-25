<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="frmMain.aspx.cs" Inherits="WebApplication1._Default" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head runat="server">
    <title>Slot Heaven</title>
    
   
</head>
<body>
    <form id="frmMain" runat="server">
    <div id="divInputs" runat="server">
        </div>
  

     <script type="text/javascript">     
        function fnCheckBet(lblBet){
            
            var iBalance = document.getElementById('<%= lblBalance.ClientID %>').innerText;
            var iBetAmt = (lblBet.innerText == '' || isNaN(lblBet.innerText)) ? ((lblBet.textContent == '' || isNaN(lblBet.textContent)) ? -1 : parseInt(lblBet.textContent)) : parseInt(lblBet.innerText);
            
            if (iBetAmt == -1)
            {
                alert('Please choose a bet amount!');
                return false;
            }
            
            if ((iBalance - iBetAmt) < 0 && (iBalance >= parseInt('<%= ConfigurationManager.AppSettings["MinBet"] %>')))
            {
                alert('Insufficient balance for a bet of <%= ConfigurationManager.AppSettings["MaxBet"] %> credits! Bet <%= ConfigurationManager.AppSettings["MinBet"] %>...');
                return false;
            }
            
            return true;
        }
        
        function fnSetBet(minMax){
        
            var lblBet = document.getElementById('<%= lblBet.ClientID %>');
            var sBetAmt =  minMax == 'min' ? '5' : '10';
            lblBet.style.textAlign = 'center';
            lblBet.style.fontSize = 'larger';
            lblBet.style.fontWeight = 'bold';
            lblBet.style.color = '#FF0000';
            lblBet.style.fontFamily = 'Tahoma';
            
            lblBet.innerText = sBetAmt;
            lblBet.textContent = sBetAmt;
            document.getElementById('<%= hfThisBet.ClientID %>').value = sBetAmt;
        }
        
        function fnReset(){
        
            document.getElementById('<%= hfReset.ClientID %>').value = '1';
            
            document.getElementById('<%= divLink.ClientID %>').style.display = 'block';
            
        }
        
        function fnClickPic(){
        
            document.getElementById('<%= btnSpin.ClientID %>').src = 'images/SpinButton_Clicked.gif';
            
        }
    </script>
    
    
    <div id="divOnOff">
        <asp:HiddenField ID="hfBalance" runat="server" Value="0" />
        <asp:HiddenField ID="hfNoSpin" runat="server" Value="0" />
        <asp:HiddenField ID="hfLastBet" runat="server" Value="-1" />
        <asp:HiddenField ID="hfThisBet" runat="server" Value="" />
        <asp:HiddenField ID="hfReset" runat="server" Value="0" />
    </div>
            
            
    <div id="divBackground" runat="server" class="background">
        <div id="divMain" class="main" runat="server" style="" >
            <table style="width:700px;margin-left:123px;" id="tblMain" runat="server" >
            <tr>
                <td id="td0" class="main"  runat="server" style="vertical-align:top;">
                    <div id="div_1_0" class="divPic">
                        <asp:Image ID="Image0" runat="server" ImageUrl="~/images/Chip.jpg" /></div>
                    <div id="div_1_1" class="divPic">
                        <asp:Image ID="Image1" runat="server" ImageUrl="~/images/Clover.jpg" /></div>
                    <div id="div_1_2" class="divPic">
                        <asp:Image ID="Image2" runat="server" ImageUrl="~/images/Crown.jpg" /></div>
                    <div id="div_1_3" class="divPic">
                        <asp:Image ID="Image3" runat="server" ImageUrl="~/images/Diamond.jpg" /></div>
                    <div id="div_1_4" class="divPic">
                        <asp:Image ID="Image4" runat="server" ImageUrl="~/images/Grapes.jpg" /></div>
                    <div id="div_1_5" class="divPic">
                        <asp:Image ID="Image5" runat="server" ImageUrl="~/images/Horseshoe.jpg" /></div>
                    <div id="div_1_6" class="divPic">
                        <asp:Image ID="Image6" runat="server" ImageUrl="~/images/Pear.jpg" /></div>
                    <div id="div_1_7" class="divPic">
                        <asp:Image ID="Image7" runat="server" ImageUrl="~/images/Star.jpg" /></div>
                    <div id="div_1_8" class="divPic">
                        <asp:Image ID="Image8" runat="server" ImageUrl="~/images/Strawberry.jpg" /></div></td>
                <td id="td1" class="main"  runat="server" style="vertical-align:top;">
                    <div id="div_2_0" class="divPic">
                        <asp:Image ID="Image10" runat="server" ImageUrl="~/images/Chip.jpg" /></div>
                    <div id="div_2_1" class="divPic">
                        <asp:Image ID="Image11" runat="server" ImageUrl="~/images/Clover.jpg" /></div>
                    <div id="div_2_2" class="divPic">
                        <asp:Image ID="Image12" runat="server" ImageUrl="~/images/Crown.jpg" /></div>
                    <div id="div_2_3" class="divPic">
                        <asp:Image ID="Image13" runat="server" ImageUrl="~/images/Diamond.jpg" /></div>
                    <div id="div_2_4" class="divPic">
                        <asp:Image ID="Image14" runat="server" ImageUrl="~/images/Grapes.jpg" /></div>
                    <div id="div_2_5" class="divPic">
                        <asp:Image ID="Image15" runat="server" ImageUrl="~/images/Horseshoe.jpg" /></div>
                    <div id="div_2_6" class="divPic">
                        <asp:Image ID="Image16" runat="server" ImageUrl="~/images/Pear.jpg" /></div>
                    <div id="div_2_7" class="divPic">
                        <asp:Image ID="Image17" runat="server" ImageUrl="~/images/Star.jpg" /></div>
                    <div id="div_2_8" class="divPic">
                        <asp:Image ID="Image18" runat="server" ImageUrl="~/images/Strawberry.jpg" /></div></td>
                <td id="td2" class="main" runat="server" style="vertical-align:top;">
                    <div id="div_3_0" class="divPic">
                        <asp:Image ID="Image20" runat="server" ImageUrl="~/images/Chip.jpg" /></div>
                    <div id="div_3_1" class="divPic">
                        <asp:Image ID="Image21" runat="server" ImageUrl="~/images/Clover.jpg" /></div>
                    <div id="div_3_2" class="divPic">
                        <asp:Image ID="Image22" runat="server" ImageUrl="~/images/Crown.jpg" /></div>
                    <div id="div_3_3" class="divPic">
                        <asp:Image ID="Image23" runat="server" ImageUrl="~/images/Diamond.jpg" /></div>
                    <div id="div_3_4" class="divPic">
                        <asp:Image ID="Image24" runat="server" ImageUrl="~/images/Grapes.jpg" /></div>
                    <div id="div_3_5" class="divPic">
                        <asp:Image ID="Image25" runat="server" ImageUrl="~/images/Horseshoe.jpg" /></div>
                    <div id="div_3_6" class="divPic">
                        <asp:Image ID="Image26" runat="server" ImageUrl="~/images/Pear.jpg" /></div>
                    <div id="div_3_7" class="divPic">
                        <asp:Image ID="Image27" runat="server" ImageUrl="~/images/Star.jpg" /></div>
                    <div id="div_3_8" class="divPic">
                        <asp:Image ID="Image28" runat="server" ImageUrl="~/images/Strawberry.jpg" /></div></td></tr>
            </table>
        </div>
        <div id="divConsole" class="console" runat="server">
            <table class="console">
                <tr>
                    <td>
                        <span id="spanConBal" class="console" style="vertical-align:top;">
                            <asp:Label ID="lblBalance"  Font-Names="Tahoma" 
                                ForeColor="Red" Width="253px" Height="42px" runat="server" BorderColor="White" 
                                BorderStyle="Solid" BorderWidth="3px" Font-Size="Larger" BackColor="Black" 
                                Font-Bold="True"  /></span></td>
                    <td>
                        <span id="spanConBet" class="console">
                            <asp:Label ID="lblBet" Width="86px" Height="42px" runat="server" 
                            BorderColor="White" BorderStyle="Solid" BorderWidth="3px" BackColor="Black" 
                            ForeColor="Red" Font-Size="Larger" CssClass="console" ></asp:Label></span></td>
                    <td>
                        <span id="spanConPayout"   class="console">
                            <asp:Label ID="lblPayout" Font-Names="Tahoma" 
                            ForeColor="Red" Width="165px" Height="42px" runat="server" BorderColor="White" 
                            BorderStyle="Solid" BorderWidth="3px" Font-Size="Larger" BackColor="Black" 
                            Font-Bold="True"  /></span></td></tr></table>
            
            
            
        
        </div>
        <div id="divButtonPanel" class="button_pnl">
            <table style="width:800px; table-layout:fixed;">
                <tr>
                    <td>
                        <span id="spanBtnReset" class="button_pnl">
                            <asp:ImageButton ID="imgbtnReset" runat="server" ImageUrl="~/images/Reset_Off.gif" /></span></td>
                    <td>
                        <table  class="button_pnl" id="tblBtnBetsRmng">
                            <tr>
                                <td>
                                    <asp:Label ID="Label1" Width="97" BackColor="Black" ForeColor="White" Font-Size="Small" Text="BETS REMAINING" runat="server" style="font-family:Tahoma; font-weight:bold;" /></td></tr>
                            <tr>
                                <td>
                                    <asp:Label ID="lblBetsRemaining" Width="97px" BackColor="Black" ForeColor="Red"  runat="server" Font-Bold="True" Text="Testing" style="font-family:Tahoma; font-weight:bold;"  /></td></tr></table></td>
                    <td style="width:100px;">
                        <span  id="spanBtnBetMax" class="button_pnl">
                            <asp:Image ID="imgBetMax"  ImageUrl="~/images/BetMax.gif"  onclick="fnSetBet('max')" runat="server" /></span></td>
                    <td style="text-align:left; padding-left:15px;">
                        <span id="spanBtnBetMin" class="button_pnl">
                            <asp:Image ID="imgBetMin" runat="server" ImageUrl="~/images/BetMin.gif" onclick="fnSetBet('min')" /></span></td>
                    <td style="width:200px;">
                        <span class="button_pnl">
                            <asp:ImageButton ID="btnSpin" runat="server" ImageUrl="~/images/SpinButton.gif" onclick="ImageButton1_Click" /></span></td></tr></table>
                
            
                
            
        </div>
        <div id="divLink" class="link" runat="server">
            Please click 'Reset' to return to questions...</div>
    </div>
    
    </form>
    
    
</body>
</html>
