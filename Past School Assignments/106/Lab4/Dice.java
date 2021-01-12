import javax.swing.JOptionPane;

public class Dice {
	public static void main(String[] args) {
		String table = "";
		
		// Store table header in variable
		table = table + "Dice Rolls\n";
		// Loop and store the balances of each year in a variable
		for (int i=1; i <= 10; i++) {
		
			// Generate two random numbers between 1 and 6
			int d1 = (int) (Math.random() * 6) + 1;
			int d2 = (int) (Math.random() * 6) + 1;
			table = table + d1 + " " + d2 + "\n";
		}	
		
		// Print the table
		JOptionPane.showMessageDialog(null, table);
	}
}

