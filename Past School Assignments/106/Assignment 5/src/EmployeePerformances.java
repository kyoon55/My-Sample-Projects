/*
 Kyoungjin Yoon
 IT 106 003
 November 18 2014
 Assignment 10
 This program is to gather clusters of information of the less and equal to ten employees and their sales last month. User is to enter a number of employees names not exceeding a number of 10. 
 Whenever the user enters a - button or enters the entire 10 employees' names, the user will be notified to enter each of their sales for the last month.  Their sales are to be added altogether 
 and averaged. If each of their grades are lower than the average, he or she will be warned to work more. If the employee's sales is equivalent to the average amount, he or she will be informed
 that he or she is just doing an average work. If the employee earns sales amount more than average, he or she will earn a bonus of 5% of his or her sales. Throughout all calculations and 
 determination of their performances, the employees' names, their sales, and their performance descriptions will be shown on an output window. 
 */

import javax.swing.JOptionPane;

public class EmployeePerformances {
	public static void main (String [] args) {
		String [] employeeNames = getEmployeeName();
		double [] employeeSales = gatherEmployeeSales(employeeNames);
		double average = getAverage(employeeSales);
		String [] performance = getEmployeePerformance(employeeSales, average);
		printName(employeeNames, employeeSales, average, performance);
		//This main method is to gather all other methods including input, processing, and output methods.
		//There is a array parameter called args.
		//It does not have any return value.
	}
	
		public static String [] getEmployeeName() {
		String [] names = new String [10];
		int number = 0;
			for (int i = 0; i < names.length; i++) {
						names [i] = JOptionPane.showInputDialog("Please enter employee number " + (i+1) + ".\nMaximum number of employees you can enter is 10."
								+ "\nIf you want to stop your entry, please press - (a slash button next to number 0 on your keyboard).");
						if (names [i].equals("-")) {
							names [i] = names [number];
							JOptionPane.showMessageDialog(null, "You will be prompted to entering amount of sales for each of the employees.");
							break;	
							//for loop will cease if the user inputs -. 
					} else {
						number++;	
						//This is incremented to track the user makes either number 10 or less. 
					}
			}
			String [] newNames = new String [number];
			for (int j = 0; j < number; j++) {
				newNames [j] = names [j];
			}
		return newNames;
		/*
		 This getEmployeeName method is for a user to input the employees' names. If the user enters -, he or she will be prompted to entering the employees' sales amount.
		 Otherwise, he or she will enter all 10 employees' names.
		 There is no parameter passed.
		 It returns array elements called newNames. This contains a number of either 10 or less if the user input the - button. 
		 */
		
		
		}
		
		public static double [] gatherEmployeeSales(String [] employeeNames) {
			double [] sales = new double [employeeNames.length];
			double salesEntry = 0;
			if (employeeNames.length == 10) {
				JOptionPane.showMessageDialog(null, "You have entered a maximum number of employees' names. \nYou will be proceeded to entering each of their sales for the last month.");
			}
				for (int i = 0; i < employeeNames.length; i++) {
					do {
						try {
								salesEntry = Double.parseDouble(JOptionPane.showInputDialog("Please enter the " + employeeNames[i] + "'s sales for the last month."
										+ "\nYou are not allowed to enter amount less than $0 or more than $500,000. "
										+ "\nAlso you cannot enter any letter."));
							 	if (salesEntry < 0 || salesEntry > 500000) {
							 		salesEntry = 500000.01;
							 		JOptionPane.showMessageDialog(null, "Error, You cannot enter amount less than $0 or more than $500,000.");
							 	} else {	
							 		sales [i] = salesEntry;
							 		//Stores employees' amount of sales to the sales array. 
							 	}
						} catch (NumberFormatException e) {
							salesEntry = 500000.01;
							JOptionPane.showMessageDialog(null, "Error, You cannot enter any letter.");
						}
					} while (salesEntry < 0 || salesEntry > 500000);
				}
			return sales;
			/*
			 This gatherEmployeeSales method gathers each of the sales amount. It cannot exceed 500,000 nor be lower than 0. The user finishes entering either all 10 or any number the user stopped at. 
			 The parameter values such as the elements of employeeNames array are passed because it needs its number of elements to read a number of elements to input the amount.
			 It returns elements of the sales Array a number of this array is equivalent to one of the array "employeeNames." 
			 */
		}
		
		public static double getAverage(double [] employeeSales) {
			double employeeTotal = 0;
			for (int i = 0; i < employeeSales.length; i++) {
				employeeTotal = employeeTotal + employeeSales [i];
				//This adds all of the employees' amount of sales. 
			}
			double employeeAverage = employeeTotal/(employeeSales.length);
			//This calculates average value of the total value. 
			return employeeAverage;
			/*
			 This getAverage method calculates both total and average. 
			 The parameter such as elements of employeeSales is passed in order to calculate the amount that employeeSales array holds.
			 This method returns the two-decimal value called employeeAverage. 
			 */
		}
		public static String [] getEmployeePerformance (double [] employeeSales, double average) {
			String [] employeePerformance = new String [employeeSales.length];
			for (int i = 0; i < employeeSales.length; i ++) {
				if (employeeSales [i] > average) {
					double bonus = employeeSales [i] * 0.05;
					employeePerformance [i] = "will be earning bonus amount $" + String.format("%.2f", bonus) + " for doing the employee's work more than average work.";
				} else if (employeeSales [i] == average) {
					employeePerformance [i] = "is doing an average work ofthe whole employees selected. Keep it on!";
				} else if (employeeSales [i] < average) {
					employeePerformance [i] =  "'s sales is below average. Extra work is required to meet the average sales.";
				}
			}
			/*
			 This getEmployeePerformance method determines whether the amount of each employee's sales meets the average. If the each amount is more than average, it will return the primitive String
			 value with the two-decimal bonus. Bonus is equal to each of the employee's amount qualified multiplied by 0.05 (5%). If the amount is the same as the average, this will return the 
			 primitive String value that says that he or she is just doing an average work. If the amount is less than the average, this will return the String value that says it does not meet the 
			 average. This method contains parameter values such as elements of employeeSales array and double value average passed from the getAvrage method.
			 */
			return employeePerformance;
		}
		public static void printName(String [] employeeNames, double [] employeeSales, double average, String [] performance) {
			String employeeInfo = "";
			for (int i = 0; i < employeeSales.length; i++) {
				employeeInfo += employeeNames [i] + "\n  Amount of sales for last month: $" +  String.format("%.2f",employeeSales [i]) 
						+  "\n  Note: Employee " + employeeNames [i] + " " + performance [i] + "\n------------------------------------------------------------------------------------------\n";
			}
			JOptionPane.showMessageDialog(null, employeeInfo);
			/*
			 This printName prints the output as a result of gathering all parameter values passed such as methods such as elements of employeeNames, employeeSales, and performance arrays 
			 and average value. This does not have any return value. 
			 */
		}
}
