import javax.swing.JOptionPane;

/*  This program calculates the average of three test grades
 *  and provides the user with an opportunity to do this for
 *  multiple sets of grades
 */

public class CalculateAverageGrade {
	public static void main(String[] args) {
		// Store the user input values for grades
		String grade1String = "", grade2String = "", grade3String = "";
		// Store the numeric values for grades
		double grade1 = 0, grade2 = 0, grade3 = 0;
		// Flag to determine if calculation should be performed
		boolean doCalculation = true;
		// Store the average calculation
		double average = 0;
		// Variable to ask if another calculation is wanted
		String anotherSet = "";
	
		// Grade calculation will be attempted at least once
		do {
			grade1String = JOptionPane.showInputDialog("Enter grade 1: ");
			grade2String = JOptionPane.showInputDialog("Enter grade 2: ");
			grade3String = JOptionPane.showInputDialog("Enter grade 3: ");
			
			// Try to convert the user input into numeric values
			try {
				grade1 = Double.parseDouble(grade1String);
				grade2 = Double.parseDouble(grade2String);
				grade3 = Double.parseDouble(grade3String);
								
				doCalculation = true;
			}
			/* If any of the user input cannot be formatted into a number
			 * make sure the calculation does not occur and show an error message
			 */
			catch (NumberFormatException e) {
				doCalculation = false;
				JOptionPane.showMessageDialog(null,
					 "You entered an invalid grade. Calculation cannot be performed.");
			}
			
			// If the calculation is ok to move forward, go ahead and display the average
			if (doCalculation == true) {			
				average = (grade1 + grade2 + grade3) / 3;
				JOptionPane.showMessageDialog(null, "Grade Average: " + average);
			}
			
			// Prompt the user for another calculation
			anotherSet = JOptionPane.showInputDialog(
				"Would you like to average another grade set? Enter 'Y' or 'N': ");
			
		} while (anotherSet.equals("y") || anotherSet.equals("Y"));
	}
}
