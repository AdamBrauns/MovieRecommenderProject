/**
 * Created by AdamBrauns on 10/3/16.
 */
import java.io.FileNotFoundException;
import java.io.UnsupportedEncodingException;
import java.util.Scanner;
import java.io.File;
import java.io.PrintWriter;

public class Driver {

    public static void main(String args[]){
        actors();
    }

    public static void actors(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/movie_actors.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("movie_actors_comma.txt", "UTF-8");
            boolean skip = true;
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                if(skip){
                    skip = false;
                }else{
                    //System.out.println(s.nextLine());
                    String movieID = array[0];
                    String actorID = array[1];
                    String actorName = array[2];
                    int rating = Integer.parseInt(array[3]);
                    writer.println(movieID + ", " + actorID + ", " + actorName + ", " + rating);
                }
            }
            writer.close();
        }catch(FileNotFoundException e){
            System.out.println("Something went wrong!");
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }
    }
}

