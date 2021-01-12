import javax.swing.JOptionPane;

/*
	This program computes income taxes, using a 
	simplified tax schedule
*/

public class TaxCalculator {
	public static void main(String[] args) {
		// The tax code provided two rates
		final double RATE1 = 0.10;
		final double RATE2 = 0.25;
		// The lower rate has limits depending on marital status
		final double RATE1_SINGLE_LIMIT = 32000;
		final double RATE1_MARRIED_LIMIT = 64000;
		double income_tax;
		
		// Read income and marital status
		double income = Double.parseDouble(JOptionPane.showInputDialog("Enter your income:"));
		String maritalStatus = JOptionPane.showInputDialog("Enter your marital status (single or married)");
		
		if (maritalStatus.equals("single")) {
			if (income <= RATE1_SINGLE_LIMIT) {
				income_tax = RATE1 * income;	
			}
			else {
				//income_tax = $3200 + 25% of income over $32000
				income_tax = (RATE1 * RATE1_SINGLE_LIMIT) + (RATE2 * (income - RATE1_SINGLE_LIMIT));
			}
		}
		else {
			if (income <= RATE1_MARRIED_LIMIT) {
				income_tax = RATE1 * income;	
			}
			else {
				//income_tax = $6400 + 25% of income over $64000
				income_tax = (RATE1 * RATE1_MARRIED_LIMIT) + (RATE2 * (income - RATE1_MARRIED_LIMIT));
			}			
		}
		JOptionPane.showMessageDialog(null, "The tax is: " + income_tax);
	}
}

