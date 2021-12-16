@extends ('layouts.master')

@section('content')
    <h1 class="banner1">About Us</h1>
    <!--The div element for the map -->
    <table>
        <tr>
            <td class="contOpa rounded">
               <h3 class="white-text">
                    Welcome to Sushi Bai Kiyoshi. Where the name of the game is quality sushi at affordable prices.
                    Located at the north end of Simcoe Street in the financial district of downtown Toronto, 
                    we await your next visit.
               </h3>
        <table class="operationtable">
            <tr>
            <td><h3 class="white-text">
                Hours of Operation</h3> 
            </td>
        </tr>
        <tr>
            <td>
                <p class="white-text">
                Monday
                <p>
            </td>
            <td>
                <p class="white-text">
                8AM - 8PM
                </p>
            </td>
        </tr>
        <tr>
        <td>
            <p class="white-text">
            Tuesday
            <p>
        </td>
        <td>
            <p class="white-text">
            CLOSED
            </p>
        </td>
    </tr>
    <tr>
    <td>
        <p class="white-text">
        Wednesday
        <p>
    </td>
    <td>
        <p class="white-text">
        8AM - 8PM
        </p>
    </td>
</tr>
<tr>
<td>
    <p class="white-text">
    Thursday
    <p>
</td>
<td>
    <p class="white-text">
    8AM - 8PM
    </p>
</td>
</tr>
<tr>
<td>
    <p class="white-text">
    Friday
    <p>
</td>
<td>
    <p class="white-text">
    8AM - 8PM
    </p>
</td>
</tr>
<tr>
<td>
    <p class="white-text">
    Saturday
    <p>
</td>
<td>
    <p class="white-text">
    8AM - 8PM
    </p>
</td>
</tr>
<tr>
<td>
    <p class="white-text">
    Sunday
    <p>
</td>
<td>
    <p class="white-text">
    8AM - 8PM
    </p>
</td>
</tr>
            </table>
            <br/>
            <br/>
                </td>
            <td class="contOpa rounded">
    <div id="map">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d308.6283521521869!2d-79.38726850128934!3d43.64946191054417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b34d1e1b4a4c3%3A0x21653829a76fe2d8!2s1104-140%20Simcoe%20St%2C%20Toronto%2C%20ON%20M5H%204E9!5e0!3m2!1sen!2sca!4v1638916865990!5m2!1sen!2sca" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
            </td>
        </tr>
    </table>
    @endsection