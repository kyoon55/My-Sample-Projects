/*
Kyoungjin Yoon
Assignment 6
IT 106 003
October 28. 2014
This program is aimed for a class registration administration to input a number of enrollments for the upcoming semester.
There are five classes for the administrator with valid CRNs. In this program, he or she will choose one of those five CRNs and put a number of enrollments
not more than 30 and not less than 0. If the administrator will do so, there will be an error message and the invalid input will not be proceeded.
If the administrator inputs a number exceeding each of the CRNs' remaining number of enrollments, this input will be invalid and not be in the system because
a number of the each CRN's enrollments are only limited to 30. When the administrator puts a valid number of enrollment, it also deducts a number of remaining 
seats of the each CRN. Also, each of those seats cannot be a negative number. The administrator will continuously enter CRNs and number of enrollments until he 
or she enters zero when prompted to enter CRN. Along with the program termination, the output shows clear lists of CRNs and their titles and number of the 
enrollments and the seats remaining.

*/
import javax.swing.JOptionPane;

public class classRegistration {
	public static void main (String [] args) {
		String classSearch;
		String [] classes = {"Introduction to IT Problem Solving Using Computer Programming",
				"Object-Oriented Techniques for IT Problem Solving",
				"Applied IT Programming", 
				"Database Fundamentals", 
				"Database Programming"};
		int [] CRN = {12451, 15349, 18467, 16890, 13334};
		int enrollment = 0;
		int [] numberOfRemaining = {30, 30, 30, 30, 30};
		int [] numberOfEnrollment = new int [5];
		// Line 19 to 28 stores data about names and CRN of the titles(classes).

		classSearch = JOptionPane.showInputDialog("Enter CRN to input a number of enrollments or enter 0 to exit this program."
				+ "\n  ------------------------------------------------------------------------------------"
				+ "\n  CRN    | Class Name                                                                                      | Enrollments | Seats Remaining "
				+ "\n  " + CRN [0] + " | " + classes [0] + "  |     " + numberOfEnrollment [0] + "             |     " + numberOfRemaining [0]
				+ "\n  " + CRN [1] + " | " + classes [1] + "                        |     " + numberOfEnrollment [1] + "             |     " + numberOfRemaining [1] + "             "
				+ "\n  " + CRN [2] + " | " + classes [2] + "                                                                   |     " + numberOfEnrollment [2] + "             |     " + numberOfRemaining [2] + "          "
				+ "\n  " + CRN [3] + " | " + classes [3] + "                                                                   |     " + numberOfEnrollment [3] + "             |     " + numberOfRemaining [3] + "          "
				+ "\n  " + CRN [4] + " | " + classes [4] + "                                                                    |     " + numberOfEnrollment [4] + "             |     " + numberOfRemaining [4] + "          ");
	// Line 31 to 38 creates an input dialog for user to type one of the CRNs. 
		
			while ((!classSearch.equals("0"))) {
				for (int i = 0; i <= 0; i++) {//for
					try { // verifies whether the user inputs a letter or any number that does not belong to elements from the CRN array.
						if ((classSearch.equals("12451") || classSearch.equals("15349") || classSearch.equals("18467") ||
								classSearch.equals("16890") || classSearch.equals("13334"))) {			
						} else {
							classSearch = "";
							}// else
						
						int classesSearchResult = Integer.parseInt(classSearch);
							if (CRN[0] == classesSearchResult) {
								if (numberOfRemaining [0] <= 0) {
									JOptionPane.showMessageDialog(null, "Course name " + classes [0] +
											" is now full. \nYou cannot proceed to inputting a number on this course.");
								}else {
									enrollment = Integer.parseInt(JOptionPane.showInputDialog("How many enrollments will there be in this course?"));
									while (enrollment > 30 || enrollment <= 0) {
										enrollment = Integer.parseInt(JOptionPane.showInputDialog("Error: the number of registrations should be "
												+ "between 1 and 30."));									
									}
								if (numberOfRemaining [0] - enrollment <= -1) {
									JOptionPane.showMessageDialog(null, "Insufficient number of capacity for enrollments. "
											+ "\nThis class has remaining number of  " + numberOfRemaining [0] + ".");
								}else {
									numberOfRemaining [0] = numberOfRemaining [0] - enrollment;
									numberOfEnrollment [0] = numberOfEnrollment [0] + enrollment;
								}//12451: Introduction to IT Problem Solving Using Computer Programming								
								}
							}//If user types 12451 he or she is prompted to input a number of enrollments longer than 0 and less than 31. Also this enrollment input value tracks the value of each elements of
							//the numberOfRemaining and numberOfEnrollment arrays.
							
							if (CRN[1] == classesSearchResult) {
								if (numberOfRemaining [1] <= 0) {
									JOptionPane.showMessageDialog(null, "Course name " + classes [1] +
											" is now full. \nYou cannot proceed to inputting a number on this course.");
								}else {
									enrollment = Integer.parseInt(JOptionPane.showInputDialog("How many enrollments will there be in this course?"));
									while (enrollment > 30 || enrollment <= 0) {
										enrollment = Integer.parseInt(JOptionPane.showInputDialog("Error: the number of registrations should be "
												+ "between 1 and 30."));									
									}
								if (numberOfRemaining [1] - enrollment <= -1) {
									JOptionPane.showMessageDialog(null, "Insufficient number of capacity for enrollments. "
											+ "\nThis class has remaining number of  " + numberOfRemaining [1] + ".");
								}else {
									numberOfRemaining [1] = numberOfRemaining [1] - enrollment;
									numberOfEnrollment [1] = numberOfEnrollment [1] + enrollment;
								}//15349: Object-Oriented Techniques for IT Problem Solving								
								}
							}//If user types 15349 he or she is prompted to input a number of enrollments longer than 0 and less than 31. Also this enrollment input value tracks the value of each elements of
							//the numberOfRemaining and numberOfEnrollment arrays.
							
							if (CRN[2] == classesSearchResult) {
								if (numberOfRemaining [2] <= 0) {
									JOptionPane.showMessageDialog(null, "Course name " + classes [2] +
											" is now full. \nYou cannot proceed to inputting a number on this course.");
								}else {
									enrollment = Integer.parseInt(JOptionPane.showInputDialog("How many enrollments will there be in this course?"));
									while (enrollment > 30 || enrollment <= 0) {
										enrollment = Integer.parseInt(JOptionPane.showInputDialog("Error: the number of registrations should be "
												+ "between 1 and 30."));									
									}
								if (numberOfRemaining [2] - enrollment <= -1) {
									JOptionPane.showMessageDialog(null, "Insufficient number of capacity for enrollments. "
											+ "\nThis class has remaining number of  " + numberOfRemaining [2] + ".");
								}else {
									numberOfRemaining [2] = numberOfRemaining [2] - enrollment;
									numberOfEnrollment [2] = numberOfEnrollment [2] + enrollment;
								}//18467: Applied IT Programming								
								}
							}//If user types 18467 he or she is prompted to input a number of enrollments longer than 0 and less than 31. Also this enrollment input value tracks the value of each elements of
							//the numberOfRemaining and numberOfEnrollment arrays.
							
							if (CRN[3] == classesSearchResult) {
								if (numberOfRemaining [3] <= 0) {
									JOptionPane.showMessageDialog(null, "Course name " + classes [3] +
											" is now full. \nYou cannot proceed to inputting a number on this course.");
								}else {
									enrollment = Integer.parseInt(JOptionPane.showInputDialog("How many enrollments will there be in this course?"));
									while (enrollment > 30 || enrollment <= 0) {
										enrollment = Integer.parseInt(JOptionPane.showInputDialog("Error: the number of registrations should be "
												+ "between 1 and 30."));									
									}
								if (numberOfRemaining [3] - enrollment <= -1) {
									JOptionPane.showMessageDialog(null, "Insufficient number of capacity for enrollments. "
											+ "\nThis class has remaining number of  " + numberOfRemaining [3] + ".");
								}else {
									numberOfRemaining [3] = numberOfRemaining [3] - enrollment;
									numberOfEnrollment [3] = numberOfEnrollment [3] + enrollment;
								}//16890: Database Fundamentals								
								}
							}//If user types 16890 he or she is prompted to input a number of enrollments longer than 0 and less than 31. Also this enrollment input value tracks the value of each elements of
							//the numberOfRemaining and numberOfEnrollment arrays.
							
							if (CRN[4] == classesSearchResult) {
								if (numberOfRemaining [4] <= 0) {
									JOptionPane.showMessageDialog(null, "Course name " + classes [4] +
											" is now full. \nYou cannot proceed to inputting a number on this course.");
								}else {
									enrollment = Integer.parseInt(JOptionPane.showInputDialog("How many enrollments will there be in this course?"));
									while (enrollment > 30 || enrollment <= 0) {
										enrollment = Integer.parseInt(JOptionPane.showInputDialog("Error: the number of registrations should be "
												+ "between 1 and 30."));									
									}
								if (numberOfRemaining [4] - enrollment <= -1) {
									JOptionPane.showMessageDialog(null, "Insufficient number of capacity for enrollments. "
											+ "\nThis class has remaining number of  " + numberOfRemaining [4] + ".");
								}else {
									numberOfRemaining [4] = numberOfRemaining [4] - enrollment;
									numberOfEnrollment [4] = numberOfEnrollment [4] + enrollment;
								}//13334: Database Programming								
								}
							}//If user types 13334 he or she is prompted to input a number of enrollments longer than 0 and less than 31. Also this enrollment input value tracks the value of each elements of
							//the numberOfRemaining and numberOfEnrollment arrays.
							
							
					} catch (NumberFormatException e) {
						classSearch = "";
						JOptionPane.showMessageDialog(null, "Wrong input. Your input should not be any letters and numbers not on the system.");
					}// This will print an error message whether he or she puts any number not from the CRN array and any letters.
						classSearch = JOptionPane.showInputDialog("Enter CRN to input a number of enrollments or enter 0 to exit this program."
								+ "\n  ------------------------------------------------------------------------------------"
								+ "\n  CRN    | Class Name                                                                                      | Enrollments | Seats Remaining "
								+ "\n  " + CRN [0] + " | " + classes [0] + "  |     " + numberOfEnrollment [0] + "             |     " + numberOfRemaining [0]
								+ "\n  " + CRN [1] + " | " + classes [1] + "                        |     " + numberOfEnrollment [1] + "             |     " + numberOfRemaining [1] + "             "
								+ "\n  " + CRN [2] + " | " + classes [2] + "                                                                   |     " + numberOfEnrollment [2] + "             |     " + numberOfRemaining [2] + "          "
								+ "\n  " + CRN [3] + " | " + classes [3] + "                                                                   |     " + numberOfEnrollment [3] + "             |     " + numberOfRemaining [3] + "          "
								+ "\n  " + CRN [4] + " | " + classes [4] + "                                                                    |     " + numberOfEnrollment [4] + "             |     " + numberOfRemaining [4] + "          ");
						//This loop will end until user enters 0.
						
				}//for end
			}// while end	
		JOptionPane.showMessageDialog(null, "Program terminated."
				+ "\n  ------------------------------------------------------------------------------------"
				+ "\n  CRN    | Class Name                                                                                      | Enrollments | Seats Remaining "
				+ "\n  " + CRN [0] + " | " + classes [0] + "  |     " + numberOfEnrollment [0] + "             |     " + numberOfRemaining [0]
				+ "\n  " + CRN [1] + " | " + classes [1] + "                        |     " + numberOfEnrollment [1] + "             |     " + numberOfRemaining [1] + "             "
				+ "\n  " + CRN [2] + " | " + classes [2] + "                                                                   |     " + numberOfEnrollment [2] + "             |     " + numberOfRemaining [2] + "          "
				+ "\n  " + CRN [3] + " | " + classes [3] + "                                                                   |     " + numberOfEnrollment [3] + "             |     " + numberOfRemaining [3] + "          "
				+ "\n  " + CRN [4] + " | " + classes [4] + "                                                                    |     " + numberOfEnrollment [4] + "             |     " + numberOfRemaining [4] + "          ");
		//prints out an output of all tracks from numbers of remaining seats and enrollments, with name of CRNs and titles.
		
	}
}
