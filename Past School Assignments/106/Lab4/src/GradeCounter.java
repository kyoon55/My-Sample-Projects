import javax.swing.JOptionPane;

public class GradeCounter {
   public static void main(String[] args) {

		final int PASSING_GRADE = 60;
		final int NUM_STUDENTS = 10;

		// Grade total used to calculate the average grade
		int gradeTotal = 0;
		
		// Counters to track number of students passed/failed
		int numStudentsPassed = 0;
		int numStudentsFailed = 0;
		
		// Minimum average grade for instructor to earn a bonus
		final int AVERAGE_FOR_BONUS = 80;
		
		// Loop through all of the students, query their grade, and increment the appropriate counter
		for (int studentCounter = 1; studentCounter <= NUM_STUDENTS; studentCounter++) {
			int grade = Integer.parseInt(JOptionPane.showInputDialog("Enter grade: " + studentCounter));
			gradeTotal += grade;
			
			if (grade >= PASSING_GRADE) {
				++numStudentsPassed;
			}
			else {
				++numStudentsFailed;
			}
		} 	
		
		// Display the number of students that have passed and failed
		JOptionPane.showMessageDialog(null,
			"The number of students passed: " + numStudentsPassed + "\n"
			+ "The number of students failed: " + numStudentsFailed + "\n"
		);
		
		// If the average grade is high enough for a bonus to be earned, inform the instructor
		if ((gradeTotal / NUM_STUDENTS) >= AVERAGE_FOR_BONUS) {
			JOptionPane.showMessageDialog(null, "Congratulations! You will earn a bonus.");
		}			 	
   }
}
