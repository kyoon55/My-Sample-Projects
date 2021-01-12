import javax.swing.JOptionPane;

public class Retirement_Implementation {
   public static void main (String [] args) {
      retirement RET = new retirement();
      String imp_name = "";
      String imp_speech = "";
      int imp_NoItems = 0;
      double imp_moneySpent = 0;
      do {
         imp_name = JOptionPane.showInputDialog("Name Please.");
         if (!RET.setName(imp_name)) {
            JOptionPane.showMessageDialog(null, "Invalid");
         }
      } while (!RET.setName(imp_name));
      JOptionPane.showMessageDialog(null, RET.getName());
      
      do {
      imp_speech = JOptionPane.showInputDialog("Will the Sir or Madam make a speech?");
      if (!RET.setSpeech(imp_speech)) {
         JOptionPane.showMessageDialog(null, "Invalid");
      }
      } while(!RET.setSpeech(imp_speech));
      
    do {
    try {
      imp_NoItems = Integer.parseInt(JOptionPane.showInputDialog("How many Items will the person purchase?"));
      
    } catch (NumberFormatException e) {
      imp_NoItems = -1;
    }
    if (!RET.setNoItemsPurchased(imp_NoItems)) {
      JOptionPane.showMessageDialog(null, "Invalid");
    }
    } while(!RET.setNoItemsPurchased(imp_NoItems)); 
    
    for (int i = 0; i < RET.getNoItemsPurchased(); i++) {
      do {
         try {
            imp_moneySpent = Double.parseDouble(JOptionPane.showInputDialog("How much will this person spend? for the item " + i+1 + "?"));
         } catch (NumberFormatException e) {
            imp_moneySpent = -1;
         }
         if (!RET.setMoneySpent(imp_moneySpent)) {
            JOptionPane.showMessageDialog(null, "Invalid");
         }
      } while (!RET.setMoneySpent(imp_moneySpent));
    } 
   }
}