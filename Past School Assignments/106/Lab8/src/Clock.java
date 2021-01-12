import javax.swing.JOptionPane;

/**
	This program is a stub to simulate the running of a clock.
*/
public class Clock {
	public static void main(String[] args) {
  
   	int hours = readValueBetween(1, 12); 	
		int minutes = readValueBetween(0, 59);
      
      printTime(hours, minutes);
	}
	
	/**
	 Prompts a user to enter a value in a given range until the
	 user provides a valid input.
	 @param low the low end of the range
	 @param high the high end of the range
	 @return the value provided by the user
	*/
	public static int readValueBetween(int low, int high) {
		int number;
		
		do {
			number = Integer.parseInt(JOptionPane.showInputDialog(
				"Enter a value between " + low + " and " + high));
		}
		while (number < low || number > high);
		
		return number;
	}
   
   public static void printTime(int hours, int minutes) {
      JOptionPane.showMessageDialog(null, "The time is " + hours
         + ":" + (minutes < 10 ? "0" : "") + minutes);
   }
}



