import javax.swing.JOptionPane;

/*
	This program removes spaces and dashes in an entered credit card number.
*/

public class FormatCCNumber {
	public static void main(String[] args) {
		String creditCardNumber = JOptionPane.showInputDialog("Enter your credit card number:");
		
		int characterCounter = 0;
		
		// Loop through each of the characters in the provided credit card number
		while (characterCounter < creditCardNumber.length()) {
			char currentCharacter = creditCardNumber.charAt(characterCounter);
			
			if (currentCharacter == ' ' || currentCharacter == '-') {
				// Remove the character at the current position
				
				// Get the part of the string before the offending character
				String before = creditCardNumber.substring(0, characterCounter);
				
				// Get the part of the string after the offending character
				String after = creditCardNumber.substring(characterCounter + 1);
				
				// Concatenate the before and after partial strings to form the new number
				creditCardNumber = before + after;
			}
			else {
				characterCounter++;
			}
		}
		
		JOptionPane.showMessageDialog(null, "Formatted Credit Card Number: " + creditCardNumber);
	}
}

