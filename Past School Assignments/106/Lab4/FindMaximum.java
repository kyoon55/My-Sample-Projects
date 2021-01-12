import javax.swing.JOptionPane;

public class FindMaximum {
	public static void main(String[] args) {
		int number = 0;
		int highestNumber = 0;
		int count = 0;
		String numberInput = "";
		
		while (!numberInput.equals("Q")) {
			numberInput = JOptionPane.showInputDialog("Enter numbers, or Q to quit");
			
			try {
				if (!numberInput.equals("Q")) {
					number = Integer.parseInt(numberInput);
					if (number > highestNumber) {				
						highestNumber = number;
						count++;
					}
				}
			}
			// Catch any bad values entered, and set the value to 0
			catch (NumberFormatException e) {
				JOptionPane.showMessageDialog(null, "Invalid salary!");
			}
		}
		if (count > 0) {
			JOptionPane.showMessageDialog(
				null, "The highest number was: " + highestNumber);
		}
		else {
			JOptionPane.showMessageDialog(null, "No data!");
		}
	}
}

