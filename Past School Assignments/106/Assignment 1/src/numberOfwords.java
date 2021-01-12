import javax.swing.JOptionPane;
/*
 Kyoungjin Yoon
 IT 106 003
 September 20, 2014
 Assignment 2
 This program is to retrieve and calculate the user input of number of sings and font styles, along with the given constant value of sales tax and surcharge. 
*/

public class numberOfwords {
	public static void main(String [] args) {
		// This lines declares value and prompts user for a new input for number of words of sings.
		double signCost = 0;
		int numSigns = Integer.parseInt(JOptionPane.showInputDialog("Please enter a number of words that will be used for a sign :"));
		String font;
		final double SALESTAX = 0.06;
		String grandTotal;
		String totalWithSalesTax;

		//This catches an error of whether the user enters zero or negative value.
		if (numSigns > 0) {
		font = JOptionPane.showInputDialog("Please enter a font"
				+ "\nComic Sans ($10.60 charged) or Arial");
		
		if (font.equals("Arial")||font.equals("Comic Sans")) {
			// This controls input value of number of words between 1 and 5.
			if (numSigns < 5 && numSigns >= 1) {
				if (font.equals("Comic Sans")) {
					signCost = 93.24 + 10.60;
				} else if (font.equals("Arial")){
				JOptionPane.showMessageDialog(null, "Wrong! your subtotal before a tax should exceed $106.06. \nPlease restart this program.");
				}
			}
			// This controls input value of number of words between 5 and 10.
			if (numSigns < 10 && numSigns >= 5) {
				if (font.equals("Comic Sans")) {
					signCost = 102.72 + 10.60;
				} else if (font.equals("Arial")){
					signCost = 102.72;
				}
			} 		
			// This controls input value of number of words more than and equal to 10.
			if (numSigns >= 10) {
				if (font.equals("Comic Sans")) {
					signCost = 107.16 + 10.60;
				} else if (font.equals("Arial")){
					signCost = 107.16;
				}
			} 	
			// These two lines calculate numbers the user put and constant values stored in this program.
			grandTotal = String.format("%.2f", signCost + (signCost * SALESTAX));
			totalWithSalesTax = String.format("%.2f", (SALESTAX * signCost));
			if (font.equals("Comic Sans")) { // These if and else statements determine if the user put either Arial or Comic Sans and prints output.
				JOptionPane.showMessageDialog(null, "Total Price Before a Sales Tax: $" + String.format("%.2f", signCost) 
						+ "\nTotal Price After a Sales Tax: $" + grandTotal
						+ "\nSales Tax: $" + totalWithSalesTax
						+ "\nNumber of Words you chose: " + numSigns + "\nFont you chose: " 
						+ font);			
			} else {
				JOptionPane.showMessageDialog(null, "Total Price Before a Sales Tax: $" + signCost
						+ "\nTotal Price After a Sales Tax: $" + grandTotal + "\nSales Tax: $" + totalWithSalesTax
						+ "\nNumber of Words you chose: " + numSigns + "\nFont you chose: " + font);	
			}
			// These if statement catches whether a user puts input other than Arial or Comic Sans.
		} else {
			JOptionPane.showMessageDialog(null, "Wrong input for a font! \nYou are only allowed to input either Comic Sans or Arial. \nPlease restart this program.");
		}
		
		//This output appears when a user types value less than 1.
		} else {
			JOptionPane.showMessageDialog(null, "Wrong input for a number of words! \nThis needs a value more than and equal to 1. \nPlease restart this program.");
		}

	}
}
