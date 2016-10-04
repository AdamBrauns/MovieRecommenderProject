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
        countries();
        directors();
        genres();
        movies();
    }

    public static void actors(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/movie_actors.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/movie_actors_comma.csv", "UTF-8");
            boolean skip = true;
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                if(skip){
                    skip = false;
                }else{
                    String movieID = array[0];
                    String actorID = array[1];
                    String actorName = array[2];
                    int rating = Integer.parseInt(array[3]);
                    writer.println(movieID + "," + actorID + "," + actorName + "," + rating);
                }
            }
            writer.close();
        }catch(FileNotFoundException e){
            System.out.println("Something went wrong!");
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }
    }

    public static void countries(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/movie_countries.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/movie_countries_comma.csv", "UTF-8");
            boolean skip = true;
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                if(skip){
                    skip = false;
                }else{
                    String movieID = array[0];
                    String country = array[1];
                    writer.println(movieID + "," + country);
                }
            }
            writer.close();
        }catch(FileNotFoundException e){
            System.out.println("Something went wrong!");
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }
    }
    public static void directors(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/movie_directors.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/movie_directors_comma.csv", "UTF-8");
            boolean skip = true;
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                if(skip){
                    skip = false;
                }else{
                    String movieID = array[0];
                    String directorID = array[1];
                    String directorName = array[2];
                    writer.println(movieID+ "," +directorID+","+directorName);
                }
            }
            writer.close();
        }catch(FileNotFoundException e){
            System.out.println("Something went wrong!");
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }
    }
    public static void genres(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/movie_genres.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/movie_genres_comma.csv", "UTF-8");
            boolean skip = true;
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                if(skip){
                    skip = false;
                }else{
                    String movieID = array[0];
                    String genre = array[1];
                    writer.println(movieID + "," + genre);
                }
            }
            writer.close();
        }catch(FileNotFoundException e){
            System.out.println("Something went wrong!");
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }
    }
    public static void movies(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/movie2.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/movies_comma.csv", "UTF-8");
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                String id = array[0];
                String title = array[1];
                String imdbID = array[2];
                String spanishTitle = array[3];
                String imdbPictureURL = array[4];
                String year = array[5];
                String rtID = array[6];
                String rtAllCriticsRating = array[7];
                String rtAllCriticsNumReviews = array[8];
                String rtAllCriticsNumFresh = array[1];
                String rtAllCriticsNumRotten = array[2];
                String rtAllcriticsScore = array[1];
                String rtTopCriticsRating = array[2];
                String rtTopCriticsNumReviews = array[1];
                String rtTopCriticsNumFresh = array[2];
                String rtTopCriticsNumRotten = array[1];
                String rtTopCriticsScore = array[2];
                String rtAudienceRating = array[1];
                String rtAudienceNumRatings = array[2];
                String rtAudienceScore = array[1];
                String rtPictureURL = array[2];
                //int rating = Integer.parseInt(array[3]);
                writer.println(id + ","+title+","+imdbID+","+spanishTitle+","+imdbPictureURL+","+
                                year+","+rtID+","+rtAllCriticsRating+","+rtAllCriticsNumReviews+","+
                                rtAllCriticsNumFresh+","+rtAllCriticsNumRotten+","+rtAllcriticsScore+","+
                                rtTopCriticsRating+","+rtTopCriticsNumReviews+","+rtTopCriticsNumFresh+","+
                                rtTopCriticsNumRotten+","+rtTopCriticsScore+","+rtAudienceRating+","+
                                rtAudienceNumRatings+","+rtAudienceScore+","+rtPictureURL);

            }
            writer.close();
        }catch(FileNotFoundException e){
            System.out.println("Something went wrong!");
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }
    }

}

