import javax.swing.JOptionPane;

/**
	This program computes the volume of two cubes.
*/

public class Cube {
	public static void main(String[] args) {
		final double CUBE_SIDE_LENGTH1 = 2;
		final double CUBE_SIDE_LENGTH2 = 10;
	
		double cubeVolume1 = cubeVolume(CUBE_SIDE_LENGTH1);
		double cubeVolume2 = cubeVolume(CUBE_SIDE_LENGTH2);
		JOptionPane.showMessageDialog(null,
			"A cube with side length " + CUBE_SIDE_LENGTH1 + " has volume " + cubeVolume1);
		JOptionPane.showMessageDialog(null,
			"A cube with side length " + CUBE_SIDE_LENGTH2 + " has volume " + cubeVolume2);			
	}
	
	/**
		Computes the volume of a cube
		@param sideLength the side length of the cube
		@return the volume
	*/
	public static double cubeVolume(double sideLength) {
		// Could also use double volume = Math.pow(sideLength, 3);
		double volume = sideLength * sideLength * sideLength;
		return volume;
	}
}


