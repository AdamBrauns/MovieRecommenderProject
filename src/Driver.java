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
        movie_tags();
        tags();
        user_rated_movies();
        user_ratedmovies_timestamps();
        user_taggedmovies();
        user_taggedmovies_timestamps();
    }

    public static void actors(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/data/movie_actors.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/data/movie_actors_comma.csv", "UTF-8");
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
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/data/movie_countries.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/data/movie_countries_comma.csv", "UTF-8");
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
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/data/movie_directors.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/data/movie_directors_comma.csv", "UTF-8");
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
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/data/movie_genres.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/data/movie_genres_comma.csv", "UTF-8");
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
    public static void movie_tags(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/data/movie_tags.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/data/movie_tags_comma.csv", "UTF-8");
            boolean skip = true;
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                if(skip){
                    skip = false;
                }else{
                    String movieID = array[0];
                    String tagID = array[1];
                    String tagWeight = array[2];
                    writer.println(movieID + "," + tagID + ","+tagWeight);
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
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/data/movie2.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/data/movies_comma.csv", "UTF-8");
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
                String rtAllCriticsNumFresh = array[9];
                String rtAllCriticsNumRotten = array[10];
                String rtAllcriticsScore = array[11];
                String rtTopCriticsRating = array[12];
                String rtTopCriticsNumReviews = array[13];
                String rtTopCriticsNumFresh = array[14];
                String rtTopCriticsNumRotten = array[15];
                String rtTopCriticsScore = array[16];
                String rtAudienceRating = array[17];
                String rtAudienceNumRatings = array[18];
                String rtAudienceScore = array[19];
                String rtPictureURL = array[20];
                //int rating = Integer.parseInt(array[3]); //Might have to change variables to ints later on
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
    public static void tags(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/data/tags.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/data/tags_comma.csv", "UTF-8");
            boolean skip = true;
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                if(skip){
                    skip = false;
                }else{
                    String movieID = array[0];
                    String tagID = array[1];
                    writer.println(movieID + "," + tagID);
                }
            }
            writer.close();
        }catch(FileNotFoundException e){
            System.out.println("Something went wrong!");
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }
    }
    public static void user_rated_movies(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/data/user_ratedmovies.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/data/user_ratedmovies_comma.csv", "UTF-8");
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                String userID = array[0];
                String movieID = array[1];
                String rating = array[2];
                String date_day = array[3];
                String date_month = array[4];
                String date_year = array[5];
                String date_hour = array[6];
                String date_minute = array[7];
                String date_second = array[8];
                //int rating = Integer.parseInt(array[3]); //Might have to change variables to ints later on
                writer.println(userID + ","+movieID+","+rating+","+date_day+","+date_month+","+
                        date_year+","+date_hour+","+date_minute+","+date_second);
            }
            writer.close();
        }catch(FileNotFoundException e){
            System.out.println("Something went wrong!");
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }
    }
    public static void user_ratedmovies_timestamps(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/data/user_ratedmovies-timestamps.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/data/user_ratedmovies-timestamps_comma.csv", "UTF-8");
            boolean skip = true;
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                if(skip){
                    skip = false;
                }else{
                    String userID = array[0];
                    String movieID = array[1];
                    String rating = array[2];
                    String timestamp = array[3];
                    writer.println(userID + "," + movieID + ","+rating+","+timestamp);
                }
            }
            writer.close();
        }catch(FileNotFoundException e){
            System.out.println("Something went wrong!");
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }
    }
    public static void user_taggedmovies(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/data/user_taggedmovies.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/data/user_taggedmovies_comma.csv", "UTF-8");
            boolean skip = true;
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                if(skip){
                    skip = false;
                }else{
                    String userID = array[0];
                    String movieID = array[1];
                    String tagID = array[2];
                    String date_day = array[3];
                    String date_month = array[4];
                    String date_year = array[5];
                    String date_hour = array[6];
                    String date_minute = array[7];
                    String date_second = array[8];
                    //int rating = Integer.parseInt(array[3]); //Might have to change variables to ints later on
                    writer.println(userID + ","+movieID+","+tagID+","+date_day+","+date_month+","+
                            date_year+","+date_hour+","+date_minute+","+date_second);
                }
            }
            writer.close();
        }catch(FileNotFoundException e){
            System.out.println("Something went wrong!");
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }
    }
    public static void user_taggedmovies_timestamps(){
        File file = new File("/Users/AdamBrauns/IdeaProjects/MovieRecommender/src/data/user_taggedmovies-timestamps.txt");
        try {
            Scanner s = new Scanner(file);
            PrintWriter writer = new PrintWriter("src/data/user_taggedmovies-timestamps_comma.csv", "UTF-8");
            boolean skip = true;
            while(s.hasNextLine()){
                String array[] = s.nextLine().split("\\t");
                if(skip){
                    skip = false;
                }else{
                    String userID = array[0];
                    String movieID = array[1];
                    String tagID = array[2];
                    String timestamp = array[3];
                    writer.println(userID + "," + movieID + ","+tagID+","+timestamp);
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

