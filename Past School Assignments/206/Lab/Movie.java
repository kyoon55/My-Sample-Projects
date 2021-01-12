public class Movie {
   private String title;
   private int length;
   private static int numMovies = 0;
   
   public Movie() {
      this("", 0);
   }
   
   public Movie(String title, int length) {
      this.title = title;
      this.length = length;
      ++numMovies;
   }
   
   public String getTitle() { return this.title; }
   public int getLength() { return this.length; }
   public static int getNumMovies() { return numMovies; }
   
   public void setTitle(String title) {
      this.title = title;
   }
   
   public boolean setLength(int length) {
      if (length > 0) {
         this.length = length;
         return true;
      }
      else {
         return false;
      }
   }
}