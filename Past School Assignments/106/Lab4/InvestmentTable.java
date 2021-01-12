import javax.swing.JOptionPane;

/*
	This program prints a table showing the growth of an investment.
*/

public class InvestmentTable {
	public static void main(String[] args) {
		// Setup variables
		final double RATE = 5;
		final double INITIAL_BALANCE = 10000;
		double balance = INITIAL_BALANCE;
		String table="";
		
		// Get number of years to run table
		int numYears = Integer.parseInt(JOptionPane.showInputDialog(
			"Enter number of years:"));
		
		// Store table header in variable
		table = table + "Investment Table\n";
		// Loop and store the balances of each year in a variable
		for (int year=1; year <= numYears; year++) {
			double interest = balance * RATE / 100;
			balance = balance + interest;
			table = table + year + "    $" + String.format("%.2f", balance) + "\n";
		}	
		
		// Print the table
		JOptionPane.showMessageDialog(null, table);
	}
}

