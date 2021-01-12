import javax.swing.JOptionPane;

/**
  The purpose of this program is to determine if selective service
  registration is required or not
 */

public class Registration {
	public static void main (String[] args) {
		// Get the name, age, and gender of the user
		String name = getName();
		int age = getAge();
		char gender = getGender();
		
		/* Determine if selective service registration is required and 
		 * inform the user of the result
		 */
		boolean required = isRegistrationRequired(age, gender);
		displayMessage(name, required);
	}
	
	/**
	 Prompts a user to enter a name.
	 @return the name entered
	*/
	public static String getName() {
		String name = JOptionPane.showInputDialog("Enter name: ");
		return name;
	}
	
	/**
	 Prompts a user to enter an age in a given range until the
	 user provides a valid age.
	 @return the age entered
	*/
	public static int getAge() {
		int age;
		// while the user has entered an invalid age, continue to prompt them
		do {
			// Try to parse the user entered information into an integer
			try {
				age = Integer.parseInt(JOptionPane.showInputDialog("Enter age: "));
			}
			// Catch the error whereby the user does not type in a number
			catch (NumberFormatException e) {
				age = 0;
			}
			// If the user entered age is invalid or out of range, display an error
			if (age <= 0 || age >= 130) {
				JOptionPane.showMessageDialog(null, 
					"You have entered an invalid age. Please try again.");
			}
		}
		while (age <= 0 || age >= 130);
		
		return age;
	}

	/**
	 Prompts a user to enter a gender of M or F until the
	 user provides a valid gender.
	 @return the gender entered
	*/
	public static char getGender() {
		char gender;
		// while the user has entered an invalid gender, continue to prompt them
		do {
			/* Use the charAt function to try to get the first character in the String
			 * Remember: Strings are an array of characters
			 */
			try {
				gender = JOptionPane.showInputDialog(
					"Enter gender (M or F): ").charAt(0);
			}
			/* Catch the error whereby the user does not type in any value
			 * so charAt(0) would not exist
			 */
			catch (StringIndexOutOfBoundsException e) {
				gender = ' ';
			}
			
			// If the gender entered is invalid, display an error
			if (gender != 'M' && gender != 'F') {
				JOptionPane.showMessageDialog(null,
					"You have entered an invalid gender. Please try again.");
			}
		}
		while (gender != 'M' && gender != 'F');
		return gender;
	}

	/**
	 Determines if a user is required to register for the selective service
	 @param age the age of the user
	 @param gender the gender of the user
	 @return if registration is required or not
	*/
	public static boolean isRegistrationRequired(int age, char gender) {
		boolean required = true;
		
		/* If the user is male and at least 18 years of age, they are required
		 * to register for selective service. Otherwise, they are not.
		 */
		if (gender == 'M' && age >= 18) {
			required = true;
		}
		else {
			required = false;
		}
		
		return required;
	}
	
	/**
	 Prints a formatted message to the user informing them if registration 
	 for the selective service is required
	 @param name the name of the user
	 @param required if registration is required or not
	*/	
	public static void displayMessage(String name, boolean required) {
	
		/* Display a message to the user informing them if they are required
		 * to register for the selective service or not
		 */
		if (required == true) {
			JOptionPane.showMessageDialog(null, name +
				", selective service registration is required.");
		}
		else {
			JOptionPane.showMessageDialog(null, name +
				", selective service registration is not required.");
		}
		
	}
}
