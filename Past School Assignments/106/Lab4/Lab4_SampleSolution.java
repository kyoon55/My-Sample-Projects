bplist00�_WebSubresources_WebMainResource��	
_WebResourceMIMEType^WebResourceURL_WebResourceResponse_WebResourceData_application/javascript_msafari-extension://com.diigo.safari.awesomeScreenshot-5DXNM3K2CT/d6b961ed/javascripts/presto/prestosavings.jsOrbplist00�67X$versionX$objectsY$archiverT$top ���%&-./012U$null�	
R$3V$classR$6R$1R$9R$4R$7R$2R$5R$0R$8��
� �	�� ��� 
!#$WNS.base[NS.relative� ��_msafari-extension://com.diigo.safari.awesomeScreenshot-5DXNM3K2CT/d6b961ed/javascripts/presto/prestosavings.js�'()*Z$classnameX$classesUNSURL�+,UNSURLXNSObject#A�ܢ��	J_application/javascript$#��������'(34]NSURLResponse�5,]NSURLResponse_NSKeyedArchiver�89_WebResourceResponse�    # - 2 7 C I ` c j m p s v y |  � � � � � � � � � � � � � � � � � � �,1<EKNT]fh����������             :              �O$/*
 * PrestoSavings namespace
 */
if (typeof PrestoSavingsiFrame == "undefined") {
    var PrestoSavingsiFrame = {};
};

PrestoSavingsiFrame = {
    partner_settings: {},

    load: function() {
        if (PrestoSavingsiFrame.partner_settings.retarget_drop == true) {
            var pframe = document.createElement('div');
            pframe.innerHTML = decodeURIComponent(PrestoSavingsiFrame.partner_settings.retarget_item);
            document.getElementsByTagName("body")[0].appendChild(pframe);
        }

        //if no coupons/prices/injection stop:
        if (!PrestoSavingsiFrame.partner_settings.coupons && !PrestoSavingsiFrame.partner_settings.price_comparison && !PrestoSavingsiFrame.partner_settings.injection)
            return false;

        var iframe = document.createElement("iframe");
        iframe.setAttribute("src", PrestoSavingsiFrame.partner_settings.params.src + "iframe.php");
        iframe.id = "prestosavings-ifrm-01";
        iframe.name = "prestosavings-ifrm-01";
        iframe.style.width = "330px";
        iframe.style.height = "0px";
        iframe.style.border = "0px";
        iframe.style.position = "fixed";
        iframe.style.bottom = "0px";
        iframe.style.right = "0px";
        iframe.style.padding = "0px";
        iframe.style.lineHeight = "1em";
        iframe.style.zIndex = "99999999999";
        iframe.style.marginRight = "10px";
        document.getElementsByTagName("body")[0].appendChild(iframe);

        var iframe2 = document.createElement("iframe");
        iframe2.setAttribute("src", PrestoSavingsiFrame.partner_settings.params.src + "iframe2.php");
        iframe2.id = "prestosavings-ifrm-02";
        iframe2.name = "prestosavings-ifrm-02";
        iframe2.style.width = "100%";
        iframe2.style.height = "0px";
        iframe2.style.border = "0px";
        iframe2.style.position = "absolute";
        iframe2.style.top = "0px";
        iframe2.style.left = "0px";
        iframe2.style.padding = "0px";
        iframe2.style.lineHeight = "1em";
        iframe2.style.zIndex = "99999999999";
        iframe2.style.marginRight = "10px";
        document.getElementsByTagName("body")[0].appendChild(iframe2);

        var ifrm_json = {
            "message": "init",
            "pc": false,
            "cp_pop": PrestoSavingsiFrame.partner_settings.params.cppop,
            "pc_pop": PrestoSavingsiFrame.partner_settings.params.pcpop,
            "bar_pop": PrestoSavingsiFrame.partner_settings.params.bar,
            "uid": PrestoSavingsiFrame.partner_settings.params.uid,
            "pid": PrestoSavingsiFrame.partner_settings.params.pid,
            "host": document.location.host,
            "referer": encodeURIComponent(document.location),
            "psize": window.innerHeight,
            "cookie": PrestoSavingsiFrame.readCookie('prestosavings_seen'),
            "partner_settings": PrestoSavingsiFrame.partner_settings,
            "injectConfirm": PrestoSavingsiFrame.readCookie('injectConfirm'),
            "prestoInject": PrestoSavingsiFrame.readCookie('prestoshopperInjected'),
            "injectNotification": PrestoSavingsiFrame.readCookie('injectNotification'),
            "hideBar": PrestoSavingsiFrame.readCookie('PShideBar')
        };

        if (PrestoSavingsiFrame.partner_settings.merchant != false && ifrm_json.pc_pop == true) {
            ifrm_json['mercname'] = PrestoSavingsiFrame.partner_settings.merchant.merchantName;
            for (var strKey in PrestoSavingsiFrame.partner_settings.merchant) {
                if (strKey != 'merchantName') {
                    var strXPathValue = PrestoSavingsiFrame.partner_settings.merchant[strKey];
                    ifrm_json[strKey] = PrestoSavingsiFrame.parseXPath(strXPathValue);
                    ifrm_json['pc'] = true;
                }
            }
        }

        iframe.onload = function() {
            iframe.contentWindow.postMessage(ifrm_json, "*");
        }
        iframe2.onload = function() {
            iframe2.contentWindow.postMessage(ifrm_json, "*");
        }

    },
    affiliateNet: function() {
        if (!PrestoSavingsiFrame.partner_settings.injection)
            return false;

        if (PrestoSavingsiFrame.partner_settings.injection_suspend == true) {
            PrestoSavingsiFrame.createCookie('prestoshopperLoad', 1);
            PrestoSavingsiFrame.createCookie('PShideBar', 1);
        }

        //if requires confirmation to inject, and inject cookie is not set, do not inject, popup bar instead.
        var inj_confirm = PrestoSavingsiFrame.readCookie('injectConfirm');
        if (inj_confirm != '1' && PrestoSavingsiFrame.partner_settings.injection_confirm == true)
            return false;

        var loaded = PrestoSavingsiFrame.readCookie('prestoshopperLoad');
        var return_url = PrestoSavingsiFrame.readCookie('prestoshopperReturn');
        if (return_url != undefined && return_url != null && return_url != '') {
            PrestoSavingsiFrame.createCookie('prestoshopperReturn', '', -1);
            PrestoSavingsiFrame.createCookie('prestoshopperInjected', 1);
            var iframe = document.createElement("iframe");
            iframe.setAttribute("src", return_url);
            iframe.setAttribute("width", "0");
            iframe.setAttribute("height", "0");
            iframe.setAttribute("frameborder", "0");
            iframe.id = "prestosavings-ifrm-03";
            iframe.style.display = "none";
            iframe.style.visibility = "hidden";
            document.getElementsByTagName("body")[0].appendChild(iframe);
            return true;
        } else if (PrestoSavingsiFrame.partner_settings.inject_in.url && !loaded) {
            if (PrestoSavingsiFrame.partner_settings.inject_in.partnerclick) {
                PrestoSavingsiFrame.createCookie('prestoshopperLoad', 1);
            } else if (PrestoSavingsiFrame.partner_settings.inject_in.active == 1 && PrestoSavingsiFrame.partner_settings.inject_in.url) {
                PrestoSavingsiFrame.createCookie('prestoshopperLoad', 1);
                PrestoSavingsiFrame.createCookie('prestoshopperInjected', 1);

                if (PrestoSavingsiFrame.partner_settings.inject_in.return_needed) {
                    PrestoSavingsiFrame.createCookie('prestoshopperReturn', document.location.href);
                }
                var iframe = document.createElement("iframe");
                iframe.setAttribute("src", PrestoSavingsiFrame.partner_settings.inject_in.url);
                iframe.setAttribute("width", "0");
                iframe.setAttribute("height", "0");
                iframe.setAttribute("frameborder", "0");
                iframe.id = "prestosavings-ifrm-03";
                iframe.style.display = "none";
                iframe.style.visibility = "hidden";
                document.getElementsByTagName("body")[0].appendChild(iframe);
                return true;
            }
        }

        return false;
    },
    parseXPath: function(xpath) {
        if (xpath == undefined || xpath == "")
            return "";

        try {
            var result = document.evaluate("normalize-space(" + xpath + ")", document, null, XPathResult.ANY_TYPE, null);
            if (result.stringValue == undefined || result.stringValue == null || result.stringValue == "" || result.stringValue.replace(/\s/g, '') == "") return '';
            return result.stringValue;
        } catch (e) {
            return "";
        }
    },
    createCookie: function(name, value, days) {
        var date, expires = '';
        if (days) {
            date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    },
    readCookie: function(cName) {
        var nameEQ = cName + "=";
        var ca = document.cookie.split(";");
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == " ") c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
};

window.addEventListener('message', function(e) {
    if (typeof e.data === 'object') {
        if (e.data.message == 'psLoadSettingsStart') {
            PrestoSavingsiFrame.partner_settings = e.data.data;
            PrestoSavingsiFrame.affiliateNet();
            PrestoSavingsiFrame.load();
        } else if (e.data.message == 'sizeCh') {
            var ifrm_prsto = document.getElementById('prestosavings-ifrm-01');
            ifrm_prsto.style.height = e.data.height;
        } else if (e.data.message == 'sizeCh02') {
            var ifrm_prsto = document.getElementById('prestosavings-ifrm-02');
            ifrm_prsto.style.height = e.data.height;
            var body = document.getElementsByTagName("body")[0];
            body.style.marginTop = e.data.height;
        } else if (e.data.message == 'setCo') {
            document.cookie = e.data.name + '=' + e.data.value + '; expires=0; path=/';
        } else if (e.data.message == 'reload') {
            window.location.reload();
        }
    }
});
�_WebResourceTextEncodingName_WebResourceFrameName_text/x-java-sourceUUTF-8P_�https://mymasonportal.gmu.edu/bbcswebdav/pid-4175947-dt-content-rid-69978886_1/courses/72717_72807_73401_73803_76146_74207_74205_74298_74300.201470_Master/Lab4_SampleSolution.javaOm<html><head><style type="text/css"></style><script type="text/javascript" src="safari-extension://com.diigo.safari.awesomeScreenshot-5DXNM3K2CT/d6b961ed/javascripts/presto/prestosavings.js"></script></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;">import javax.swing.JOptionPane;
public class Lab4_SampleSolution {
   public static void main(String[] args) {
      final int GAME_ROUNDS = 3;
      int numRoundsPlayed = 0;
      int player1Score = 0;
      int player2Score = 0;
      
      while (numRoundsPlayed &lt; GAME_ROUNDS) {
         JOptionPane.showMessageDialog(null, "Round " + (numRoundsPlayed + 1));
         
         String player1Object;
         do {
            player1Object = JOptionPane.showInputDialog("Enter the object for player 1: ");
            if (!player1Object.equalsIgnoreCase("rock") &amp;&amp; !player1Object.equalsIgnoreCase("paper") &amp;&amp; !player1Object.equalsIgnoreCase("scissors")) {
               JOptionPane.showMessageDialog(null, "Oops! You entered an invalid object. Try again.");
            }
         } while (!player1Object.equalsIgnoreCase("rock") &amp;&amp; !player1Object.equalsIgnoreCase("paper") &amp;&amp; !player1Object.equalsIgnoreCase("scissors"));

         String player2Object;
         do {
            player2Object = JOptionPane.showInputDialog("Enter the object for player 2: ");
            if (!player2Object.equalsIgnoreCase("rock") &amp;&amp; !player2Object.equalsIgnoreCase("paper") &amp;&amp; !player2Object.equalsIgnoreCase("scissors")) {
               JOptionPane.showMessageDialog(null, "Oops! You entered an invalid object. Try again.");
            }
         } while (!player2Object.equalsIgnoreCase("rock") &amp;&amp; !player2Object.equalsIgnoreCase("paper") &amp;&amp; !player2Object.equalsIgnoreCase("scissors"));
         
         if (player1Object.equalsIgnoreCase(player2Object)) {
            JOptionPane.showMessageDialog(null, "The round is a draw. Replay the round.");
         }
         else {
            if (player1Object.equalsIgnoreCase("rock")) {
               if (player2Object.equalsIgnoreCase("scissors")) {
                  JOptionPane.showMessageDialog(null, "The winner of round " + (numRoundsPlayed + 1) + " is player 1.");
                  ++player1Score;
               }
               else {
                  JOptionPane.showMessageDialog(null, "The winner of round " + (numRoundsPlayed + 1) + " is player 2.");
                  ++player2Score;
               }
            }
            else if (player1Object.equalsIgnoreCase("paper")) {
               if (player2Object.equalsIgnoreCase("scissors")) {
                  JOptionPane.showMessageDialog(null, "The winner of round " + (numRoundsPlayed + 1) + " is player 2.");
                  ++player2Score;
               }
               else {
                  JOptionPane.showMessageDialog(null, "The winner of round " + (numRoundsPlayed + 1) + " is player 1.");
                  ++player1Score;
               }            
            } 
            else if (player1Object.equalsIgnoreCase("scissors")) {
               if (player2Object.equalsIgnoreCase("rock")) {
                  JOptionPane.showMessageDialog(null, "The winner of round " + (numRoundsPlayed + 1) + " is player 1.");
                  ++player1Score;
               }
               else {
                  JOptionPane.showMessageDialog(null, "The winner of round " + (numRoundsPlayed + 1) + " is player 2.");
                  ++player2Score;
               }            
            }
            ++numRoundsPlayed;
         }
      } 
      
      String gameResult = "Number of rounds player 1 won: " + player1Score
         + "\nNumber of rounds player 2 won: " + player2Score
         + "\nThe winner of the game is player " + (player1Score &gt; player2Score ? 1 : 2);
         
      JOptionPane.showMessageDialog(null, gameResult);
           
   }
}</pre></body></html>    1 3 < R a w � ��'�'�'�'�'�'�'�(�                           8