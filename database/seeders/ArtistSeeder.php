<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $artists = [

        // ================== BOLLYWOOD ACTORS ==================
    ['name'=>'Shah Rukh Khan','gender'=>'Male','category'=>'Bollywood_Actors','photo'=>'https://via.placeholder.com/150?text=Shah+Rukh+Khan','status'=>1],
    ['name'=>'Salman Khan','gender'=>'Male','category'=>'Bollywood_Actors','photo'=>'https://via.placeholder.com/150?text=Salman+Khan','status'=>1],
    ['name'=>'Aamir Khan','gender'=>'Male','category'=>'Bollywood_Actors','photo'=>'https://via.placeholder.com/150?text=Aamir+Khan','status'=>1],
    ['name'=>'Akshay Kumar','gender'=>'Male','category'=>'Bollywood_Actors','photo'=>'https://via.placeholder.com/150?text=Akshay+Kumar','status'=>1],
    ['name'=>'Ajay Devgn','gender'=>'Male','category'=>'Bollywood_Actors','photo'=>'https://via.placeholder.com/150?text=Ajay+Devgn','status'=>1],
    ['name'=>'Hrithik Roshan','gender'=>'Male','category'=>'Bollywood_Actors','photo'=>'https://via.placeholder.com/150?text=Hrithik+Roshan','status'=>1],
    ['name'=>'Ranbir Kapoor','gender'=>'Male','category'=>'Bollywood_Actors','photo'=>'https://via.placeholder.com/150?text=Ranbir+Kapoor','status'=>1],
    ['name'=>'Ranveer Singh','gender'=>'Male','category'=>'Bollywood_Actors','photo'=>'https://via.placeholder.com/150?text=Ranveer+Singh','status'=>1],
    ['name'=>'Tiger Shroff','gender'=>'Male','category'=>'Bollywood_Actors','photo'=>'https://via.placeholder.com/150?text=Tiger+Shroff','status'=>1],
    ['name'=>'Varun Dhawan','gender'=>'Male','category'=>'Bollywood_Actors','photo'=>'https://via.placeholder.com/150?text=Varun+Dhawan','status'=>1],

    // ================== BOLLYWOOD ACTRESSES ==================
    ['name'=>'Deepika Padukone','gender'=>'Female','category'=>'Bollywood_Actresses','photo'=>'https://via.placeholder.com/150?text=Deepika+Padukone','status'=>1],
    ['name'=>'Alia Bhatt','gender'=>'Female','category'=>'Bollywood_Actresses','photo'=>'https://via.placeholder.com/150?text=Alia+Bhatt','status'=>1],
    ['name'=>'Katrina Kaif','gender'=>'Female','category'=>'Bollywood_Actresses','photo'=>'https://via.placeholder.com/150?text=Katrina+Kaif','status'=>1],
    ['name'=>'Priyanka Chopra','gender'=>'Female','category'=>'Bollywood_Actresses','photo'=>'https://via.placeholder.com/150?text=Priyanka+Chopra','status'=>1],
    ['name'=>'Kareena Kapoor','gender'=>'Female','category'=>'Bollywood_Actresses','photo'=>'https://via.placeholder.com/150?text=Kareena+Kapoor','status'=>1],
    ['name'=>'Shraddha Kapoor','gender'=>'Female','category'=>'Bollywood_Actresses','photo'=>'https://via.placeholder.com/150?text=Shraddha+Kapoor','status'=>1],
    ['name'=>'Kiara Advani','gender'=>'Female','category'=>'Bollywood_Actresses','photo'=>'https://via.placeholder.com/150?text=Kiara+Advani','status'=>1],
    ['name'=>'Anushka Sharma','gender'=>'Female','category'=>'Bollywood_Actresses','photo'=>'https://via.placeholder.com/150?text=Anushka+Sharma','status'=>1],

    // ================== TELUGU ACTORS ==================
    ['name'=>'Prabhas','gender'=>'Male','category'=>'Telugu_Actors','photo'=>'https://via.placeholder.com/150?text=Prabhas','status'=>1],
    ['name'=>'Mahesh Babu','gender'=>'Male','category'=>'Telugu_Actors','photo'=>'https://via.placeholder.com/150?text=Mahesh+Babu','status'=>1],
    ['name'=>'Ram Charan','gender'=>'Male','category'=>'Telugu_Actors','photo'=>'https://via.placeholder.com/150?text=Ram+Charan','status'=>1],
    ['name'=>'Jr NTR','gender'=>'Male','category'=>'Telugu_Actors','photo'=>'https://via.placeholder.com/150?text=Jr+NTR','status'=>1],
    ['name'=>'Allu Arjun','gender'=>'Male','category'=>'Telugu_Actors','photo'=>'https://via.placeholder.com/150?text=Allu+Arjun','status'=>1],

    // ================== TELUGU ACTRESSES ==================
    ['name'=>'Samantha Ruth Prabhu','gender'=>'Female','category'=>'Telugu_Actresses','photo'=>'https://via.placeholder.com/150?text=Samantha','status'=>1],
    ['name'=>'Rashmika Mandanna','gender'=>'Female','category'=>'Telugu_Actresses','photo'=>'https://via.placeholder.com/150?text=Rashmika','status'=>1],
    ['name'=>'Anushka Shetty','gender'=>'Female','category'=>'Telugu_Actresses','photo'=>'https://via.placeholder.com/150?text=Anushka+Shetty','status'=>1],

    // ================== TAMIL ACTORS ==================
    ['name'=>'Rajinikanth','gender'=>'Male','category'=>'Tamil_Actors','photo'=>'https://via.placeholder.com/150?text=Rajinikanth','status'=>1],
    ['name'=>'Kamal Haasan','gender'=>'Male','category'=>'Tamil_Actors','photo'=>'https://via.placeholder.com/150?text=Kamal+Haasan','status'=>1],
    ['name'=>'Vijay','gender'=>'Male','category'=>'Tamil_Actors','photo'=>'https://via.placeholder.com/150?text=Vijay','status'=>1],
    ['name'=>'Ajith Kumar','gender'=>'Male','category'=>'Tamil_Actors','photo'=>'https://via.placeholder.com/150?text=Ajith+Kumar','status'=>1],

    // ================== TAMIL ACTRESSES ==================
    ['name'=>'Nayanthara','gender'=>'Female','category'=>'Tamil_Actresses','photo'=>'https://via.placeholder.com/150?text=Nayanthara','status'=>1],
    ['name'=>'Tamannaah','gender'=>'Female','category'=>'Tamil_Actresses','photo'=>'https://via.placeholder.com/150?text=Tamannaah','status'=>1],

    // ================== BHOJPURI ACTORS ==================
    ['name'=>'Pawan Singh','gender'=>'Male','category'=>'Bhojpuri_Actors','photo'=>'https://via.placeholder.com/150?text=Pawan+Singh','status'=>1],
    ['name'=>'Khesari Lal Yadav','gender'=>'Male','category'=>'Bhojpuri_Actors','photo'=>'https://via.placeholder.com/150?text=Khesari+Lal','status'=>1],

    // ================== BHOJPURI ACTRESSES ==================
    ['name'=>'Akshara Singh','gender'=>'Female','category'=>'Bhojpuri_Actresses','photo'=>'https://via.placeholder.com/150?text=Akshara+Singh','status'=>1],
    ['name'=>'Amrapali Dubey','gender'=>'Female','category'=>'Bhojpuri_Actresses','photo'=>'https://via.placeholder.com/150?text=Amrapali','status'=>1],

    // ================== GUJARATI ACTORS ==================
    ['name'=>'Malhar Thakar','gender'=>'Male','category'=>'Gujarati_Actors','photo'=>'https://via.placeholder.com/150?text=Malhar+Thakar','status'=>1],
    ['name'=>'Yash Soni','gender'=>'Male','category'=>'Gujarati_Actors','photo'=>'https://via.placeholder.com/150?text=Yash+Soni','status'=>1],

    // ================== GUJARATI ACTRESSES ==================
    ['name'=>'Aarohi Patel','gender'=>'Female','category'=>'Gujarati_Actresses','photo'=>'https://via.placeholder.com/150?text=Aarohi+Patel','status'=>1],
    ['name'=>'Deeksha Joshi','gender'=>'Female','category'=>'Gujarati_Actresses','photo'=>'https://via.placeholder.com/150?text=Deeksha+Joshi','status'=>1],

];
    foreach ($artists as $artist) {
        Artist::create($artist);
    }
}
}
