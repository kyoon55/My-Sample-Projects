import javax.swing.JOptionPane;

/**
	This program is a stub to simulate the generation of a temporary password.
*/

public class Password {
	public static void main(String[] args) {
		String temporaryPassword = getTemporaryPassword();
		
		JOptionPane.showMessageDialog(null, "Your temporary password is: " + temporaryPassword);
	}

	/**
	 Generates a temporary password for the user
	 @return the temporary password generated
	*/
	public static String getTemporaryPassword() {
		String temporaryPassword = "";
		final int PASSWORD_LENGTH = 5;
	
		// Loop and build the temporary password one character at a time
		for (int x = 0; x < PASSWORD_LENGTH; x++) {
			temporaryPassword += RandomCharacter.getCharacter();
		}
			
		return temporaryPassword;
	}
}

