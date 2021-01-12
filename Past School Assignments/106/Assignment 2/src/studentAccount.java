/*
Kyoungjin Yoon
IT 106 002
October 3 2014
*/

import javax.swing.JOptionPane;
public class studentAccount {
	public static void main (String [] args) {
		
		//declares variables
		double student_money = 106.00;
		String meal;
		int menu = 0;
		boolean done = false;
		int counterMenu1 = 0;
		double student_deposit;

		// This loop detects whether a user has insufficient fund OR prompted 3 for menu
		while (!(done || menu ==3)) {
				String userSelection = JOptionPane.showInputDialog("menu please. \n1: select yourmeal \n2: deposit money (cannot withdraw money)"
						+ "\n3: Exit this program" + "\nCurrent Amount: $" + String.format("%.2f", student_money) + "\nNumber of Meals You Had: " + counterMenu1);
				
			//catches the value for letters
			try {
					
				//translates String value to integer so that try / catch function works
				menu = Integer.parseInt(userSelection);
				if (menu >= 4 || menu <= 0) {
					JOptionPane.showMessageDialog(null, "You are only allowed to enter either 1 (menu selection), \n2 (deposit money), and 3 (exit program)."
						+ "\n1: select your meal \n2: deposit money (cannot withdraw money)"
						+ "\n3: Exit this program");
					} else {
						
						//if the user selects menu 1
						if (menu==1) {
							meal = JOptionPane.showInputDialog("Which would you choose, breakfast, lunch, or dinner?"
								+ "\nPlease be careful of letters because they are case sensitive.");

							//The user is only allowed to enter either breakfast, lunch, and dinner.
							while(!(meal.equals("breakfast")||meal.equals("lunch")||meal.equals("dinner"))) {
								meal = JOptionPane.showInputDialog( "You are only allowed to enter \nbreakfast, dinner, or lunch. "
										+ "Be cautious to case sensitivity.");
							}
									// calculates student account balance with various meals
							if (meal.equals("breakfast")) {
								if ((student_money - 4.92) < 0 ) {
									JOptionPane.showMessageDialog(null, "insufficient money, \nThe program will be terminated.");
									done = true;
								} else {
									student_money = student_money - 4.92;//4.92
									counterMenu1++;
								}
							} 	else if (meal.equals("lunch")) {
								if ((student_money - 7.06) < 0 ) {
									JOptionPane.showMessageDialog(null, "insufficient money, \nThe program will be terminated.");
									done = true;
								} else {
									student_money = student_money - 7.06;//4.92
									counterMenu1++;
								}
							} else if (meal.equals("dinner")) {
								if ((student_money - 10.60) < 0 ) {
									JOptionPane.showMessageDialog(null, "insufficient money, \nThe program will be terminated.");
									done = true;
								} else {
									student_money = student_money - 10.06;//4.92
									counterMenu1++;
								}
							}							
						}
				
						//if the user selects menu 2
					if (menu==2) {
						student_deposit = Double.parseDouble(JOptionPane.showInputDialog("Please deposit your money ($) into your account. \n"
								+ "Amount you deposit is not refundable. \nCurrent balance: $" + String.format("%.2f", student_money)));
						while (student_deposit <= 0) {
							if (student_deposit < 0) {
								student_deposit = Double.parseDouble(JOptionPane.showInputDialog("You are not allowed to withdraw money. \nplease try again."));
						} else if (student_deposit == 0) {
							student_deposit = Double.parseDouble(JOptionPane.showInputDialog("invalid amount. \nplease try again."));
						}							
				}
					student_money = student_money + student_deposit;
				}
			}
					
			//shows an error-detecting message if a user enters letters
			} catch (NumberFormatException e) {
				JOptionPane.showMessageDialog(null, "You are not allowed to enter letters. \nplease try again.");
			}	
			
		}
		
		//shows output
		JOptionPane.showMessageDialog(null, "Program terminated, \nInitial Amount: $" + 106.00 +
				"\nCurrent Amount: $" + String.format("%.2f", student_money) + "\nNumber of Meals You Had: " + counterMenu1);
	}

}