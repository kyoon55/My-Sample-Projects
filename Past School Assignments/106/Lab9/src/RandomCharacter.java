import javax.swing.JOptionPane;

public class RandomCharacter {
	/**
	 Generates a random character which may be alphabetic or numeric
	 @return a random character
	*/
	public static char getCharacter() {
		char character = ' ';
		int characterType = (int) (Math.random() * 3) + 1;
		switch(characterType) {
			case 1:
				character = getLowerCaseLetter();
				break;
			case 2:
				character = getUpperCaseLetter();
				break;
			case 3:
				character = getDigit();
				break;
			default:
				// This point should never be reached
				JOptionPane.showMessageDialog(null, "There is an error in the program");		
				break;
		}
		
		return character;
	}

	/**
	 Generates a random character based on a specified character range
	 @param char1 the low end of the range
	 @param char2 the high end of the range
	 @return a random character
	*/
	private static char getCharacter (char char1, char char2) {
		return (char)(char1 + Math.random() * (char2 - char1 + 1));
	}
	
	/**
	 Generates a lower case letter
	 @return a lower case letter
	*/
	private static char getLowerCaseLetter () {
		return getCharacter('a', 'z');
	}

	/**
	 Generates an upper case letter
	 @return an upper case letter
	*/	
	private static char getUpperCaseLetter () {
		return getCharacter('A', 'Z');
	}	
	
	/**
	 Generates a digit
	 @return a digit
	*/
	private static char getDigit () {
		return getCharacter('0', '9');
	}	
}