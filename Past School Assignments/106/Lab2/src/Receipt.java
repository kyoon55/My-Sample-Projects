import javax.swing.JOptionPane;




public class Receipt {
	public static void main(String[] args) {
		int numBooks = Integer.parseInt(JOptionPane.showInputDialog("Enter the number of books purchased: "));
		double totalPrice = Double.parseDouble(JOptionPane.showInputDialog("Enter the total price of all books: "));
		final double SALESTAX = 0.06;
		final double SHIPPING = 1.50;
		// Line 8 through 11 declares value and prompts a user to type numbers required for this program
		
		double priceAfterTax = totalPrice + (totalPrice * SALESTAX);
		double grandTotal = priceAfterTax + (numBooks * SHIPPING);
		double salesTaxCustomer = (totalPrice * SALESTAX);
		// Line 14 through 16 calculates values that will be used for output.
		
		JOptionPane.showMessageDialog(null, "**Fenwick Books - Receipt**"
				+ "\nNumber of Books Purchased: " + numBooks + 
				"\nTotal Price: $" + String.format("%.2f", totalPrice) + 
				"\nSales Tax (6%): $" + String.format("%.2f", salesTaxCustomer) + 
				"\nShipping: $" + String.format("%.2f", SHIPPING * numBooks) + 
				"\n\nGrand Total: $" + String.format("%.2f", grandTotal));
		//Line 20 through 25 prints out the output, and output values are completely formatted and rounded to two digits.
	}	
}
