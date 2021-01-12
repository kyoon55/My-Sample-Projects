/*
 Kyoungjin Yoon
 IT 106 003
 November 13 2014
 Assignment 8
 Purpose of this program is to create an efficient code for a member of the Olympics Committee to enter five scores of an Olympic athlete. The five scores will be sorted in ascending orders
 to find out the lowest score and the highest score. Those two highest and lowest score will be exempt from the five scores and only three scores will be added to determine the athlete's qualification.
 If the athlete earns more than and equal to 28.5 and less and equal to 30.0, he or she earns a Gold medal. If the athlete earns more than and equal to 27.0 and less than 28.5, he or she earns
 a Silver medal. If the athlete earns more than and equal to 24.0 and less than 27.0, he or she earns a Bronze medal. If the athlete earns less than 24.0, it will indicate that he or she is not
 ready for the Olympics. After all five entries, five scores, three scores with the highest and lowest dropped, and the athlete's readiness will be shown as an output. The the program will be 
 terminated. During the entry, if invalid entreis such as ones less than 0 or more than 10.0 or input other than numbers are entered, the error message will be shown and will be re-prompted.
 */

import java.util.Arrays; 
//This is needed to sore the five scores in ascending order. 
import javax.swing.JOptionPane;

public class OlympicsReadiness {
	public static void main (String [] args) {
		double [] fiveJudges = getScores();
		double [] threeGrades = getThreeGrades(fiveJudges);
		String qualification = determineReadiness(threeGrades);
		double addScores = getTotalScores(threeGrades);
		gerResut(fiveJudges, threeGrades, qualification, addScores);
		// main methods contain several methods and those methods will be reused for calculation and output purposes.  
	}
	
	public static double[] getScores() {
		double [] fiveScores = new double [5];
		double 	scoreInput = 0;
		for (int i = 0; i < 5; i++) {
			do {
				try {
					scoreInput = Double.parseDouble(JOptionPane.showInputDialog("What is the score " + (i+1) + "?"
							+ "\nYou should put a score between 0.0 and 10.0"));
					
						if (scoreInput < 0 || scoreInput > 10) {
						JOptionPane.showMessageDialog(null, "Error, You should put a score between 0.0 and 10.0");
						//This error occurs because the person has entered an input less than 0.0 and more than 10.0.
					} else {
						fiveScores [i] = scoreInput;					
					}
				} catch (NumberFormatException e) {
					scoreInput = 11;
					//scoreInput =11; plays a role of converting the letter error to the number range error so that it does not continue the loop and still re-prompts the user not to type the letter. 
					JOptionPane.showMessageDialog(null, "Error, letters are not allowed to be entered. Please enter a number "
							+ "between 0.0 and 10.0. ");
					//This error occurs because the person has entered an input other than number. 
				}
			}  while (scoreInput < 0 || scoreInput > 10) ;
		}//for loop ends
		// For loop allows the person to enter five scores for five times. 
		Arrays.sort(fiveScores);
		return fiveScores;
		//This method is to return all five judge scores and detect any error if the user types the value out of the range and an input other than numbers. 
		//None of the parameter is used. 
	}

	public static double[] getThreeGrades(double[] fiveJudges) {
		double [] threePicks = new double [3];
		threePicks [0] = fiveJudges[1]; 
		threePicks [1] = fiveJudges[2];
		threePicks [2] = fiveJudges[3];
		return threePicks;
		//Sorted five scores are copied to another array. The first value (lowest) and the last value (highest) of the five judges array are excluded.
		//Parameter such as five judge scores is used. 
		//Double array elements are returned. 
	}

	public static String determineReadiness(double[] threeGrades) {
		String category;
		if ((threeGrades [0] + threeGrades [1] + threeGrades [1]) <= 30.0 && (threeGrades [0] + threeGrades [1] + threeGrades [1]) >= 28.5) {
			category = "earns Gold Medal";
		} else if ((threeGrades [0] + threeGrades [1] + threeGrades [1]) < 28.5 && (threeGrades [0] + threeGrades [1] + threeGrades [1]) >= 27.0) {
			category = "earns Silver Medal";
		} else if ((threeGrades [0] + threeGrades [1] + threeGrades [1]) < 27.0 && (threeGrades [0] + threeGrades [1] + threeGrades [1]) >= 24.0) {
			category = "earns Bronze Medal";
		} else {
			category = "is Disqualified";
		}
		return category;
		//This method is to determine the athlete's readiness. Addition of the three scores will fall into one of those four categories and returns String value called category.
		//Parameter such as three scores is used.
	}
	
	
	public static double getTotalScores(double[] threeGrades) {
		double totalScore = threeGrades[0] + threeGrades[1] + threeGrades[2];
		return totalScore;
		//This method adds all three scores without the lowest and the highest scores of the five judge scores and will be used in the other methods. 
		//Parameter such as three grades are used. 
		//double value such as totalScore is returned.
	}
	
	public static void gerResut(double[] fiveJudges, double[] threeGrades, String qualification, double addScores) {
		JOptionPane.showMessageDialog(null, "First score: " + String.format("%.1f", fiveJudges[0]) + "\nSecond score: " + String.format("%.1f", fiveJudges[1]) + 
				"\nThird score: " + String.format("%.1f", fiveJudges[2]) + "\nFourth score: " + String.format("%.1f", fiveJudges[3]) + 
				"\nFifth score: " + String.format("%.1f", fiveJudges[4])  + "\nTotal score with the highest and lowest grades dropped: " + String.format("%.1f", addScores)
				+ "\nThis Olympic ahtletic " + qualification);
		// This method prints an output of five judge scores, addition of the three scores without the lowest and the highest scores of the five scores, and the category.
		//Parameters such as three grades excluding the highest and lowest scores, qualification and additions of three scores are used.
		//This method does not have return value.
	}
}
