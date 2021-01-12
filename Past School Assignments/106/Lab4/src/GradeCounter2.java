import javax.swing.JOptionPane;

public class GradeCounter2 {
   public static void main(String[] args) {

		final int PASSING_GRADE = 60;

		// Grade total used to calculate the average grade
		int gradeTotal = 0;
		
		// Counters to track number of students passed/failed
		int numStudentsPassed = 0;
		int numStudentsFailed = 0;
		
		// Minimum average grade for instructor to earn a bonus
		final int AVERAGE_FOR_BONUS = 80;
		
		// Set counter value
		int studentCounter = 0;
		
		int grade = Integer.parseInt(JOptionPane.showInputDialog(
			"Enter grade " + (studentCounter + 1) + ": (or enter -1 to quit)"));

		/*
		 * Loop through all of the students until the sentinel value is reached,
		 * query their grade, and increment the appropriate counter
		 */
		
		while (grade != -1) {
			gradeTotal += grade;
			
			if (grade >= PASSING_GRADE) {
				++numStudentsPassed;
			}
			else {
				++numStudentsFailed;
			}
			studentCounter += 1;
			grade = Integer.parseInt(JOptionPane.showInputDialog(
			"Enter grade " + (studentCounter + 1) + ": (or enter -1 to quit)"));
		} 	
		
		// Display the number of students that have passed and failed
		JOptionPane.showMessageDialog(null,
			"The number of students passed: " + numStudentsPassed + "\n"
			+ "The number of students failed: " + numStudentsFailed + "\n"
		);
		
		// If the average grade is high enough for a bonus to be earned, inform the instructor
		if ((gradeTotal / studentCounter) >= AVERAGE_FOR_BONUS) {
			JOptionPane.showMessageDialog(null, "Congratulations! You will earn a bonus.");
		}			 	
   }
}
