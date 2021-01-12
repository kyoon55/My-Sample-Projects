public class retirement {
   public retirement() {
   
   }
   public static final double DEFAULT_BUDGET = 1000;
   private String name;
   private double budget;
   //speech
   private String speech;
   //items purchased
   private int noItemsPurchased;
   
   //money spent
   private double moneySpent;
   
   public boolean setName(String theName) {
      if (theName.length() <= 0){
         return false;
      } else {
         name = theName;
         return true;
      }
   }
   public String getName() {
      return name;
   }
   
   public boolean setSpeech(String theSpeech) {
   if ((theSpeech.equals("Yes") || theSpeech.equals("No"))){
          speech = theSpeech;
      return true;
   } else {
   return false;
      }
   }
   public String getSpeech () {
      return speech;
   }
   
   public boolean setNoItemsPurchased(int theNoItemsPurchased) {
      if (theNoItemsPurchased <= 0) {
         return false;
      } else {
         noItemsPurchased = theNoItemsPurchased;
         return true;
      }
   } 
   public int getNoItemsPurchased() {
      return noItemsPurchased;
   }
   
   public boolean setMoneySpent(double theMoneySpent) {
      if (theMoneySpent <= 0) {
         return false;
      } else {
         moneySpent = theMoneySpent;
         return true;
      }
   }
   public double getMoneySpent() {
      return moneySpent;
   }
}