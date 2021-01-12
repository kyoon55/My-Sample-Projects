import javax.swing.JOptionPane;
import edu.gmu.ait.it106.Currency;

public class Salary {
	
	public static void main(String[] args) {
		double hoursWorked = getHoursWorked();
		double rate = getRate();
		double salary = calculateSalary(hoursWorked, rate);
		displaySalary(salary);
	} 
	
	private static double getHoursWorked() {
		// Should add try/catch and value validation
		double hoursWorked = Double.parseDouble(JOptionPane.showInputDialog("Enter the number of hours worked: "));
		
		return hoursWorked;
	}

	private static double getRate() {
		// Should add try/catch and value validation
		double rate = Double.parseDouble(JOptionPane.showInputDialog("Enter the hourly rate: "));
		
		return rate;		
	}
	
	private static double calculateSalary(double hoursWorked, double rate) {
		return hoursWorked * rate;
	}
	
	private static void displaySalary(double salary) {
		JOptionPane.showMessageDialog(null, "The salary is: " + Currency.formatDollar(salary));
	}
}

