import javax.swing.JOptionPane;

public class AverageSalary {
	public static void main(String[] args) {
		double sum = 0;
		int count = 0;
		double salary = 0;
		String salaryInput = "";
		
		while (salary != -1) {
			salaryInput = JOptionPane.showInputDialog("Enter salaries, or -1 to quit");
			
			try {
				salary = Double.parseDouble(salaryInput);
				if (salary != -1) {				
					sum = sum + salary;
					count++;
				}
			}
			// Catch any bad values entered, and set the value to 0
			catch (NumberFormatException e) {
				salary = 0;
				JOptionPane.showMessageDialog(null, "Invalid salary!");
			}
		}
		if (count > 0) {
			double average = sum/count;
			JOptionPane.showMessageDialog(
				null, "Average salary: $" + String.format("%.2f", average));
		}
		else {
			JOptionPane.showMessageDialog(null, "No data!");
		}
	}
}

