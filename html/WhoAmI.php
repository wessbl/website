<body
    style='background-color: black;
    color: white;
    background-image: url("images/fingerprint_3.png");
    background-size: 300px;
    background-position: bottom;
    background-position: right;
    background-repeat: no-repeat'
>
    <center>
        <p style='font-size: 500%; font-family: "Courier New", Courier, monospace'>Who Am I?</p>
        <div id="form_container">
            <form method = "POST" action = "WhoYouAre.php">
                <table>
                    <tr>
                        <td width="100">Name: </td>
                        <td><input type="text" name="Name" required></td>
                    </tr>
                    <tr>
                        <td>Age: </td>
                        <td><input type="number" name="Age" required></td>
                    </tr>
                    <tr>
                        <td>Address:   </td>
                        <td><input type="text" name="Address" required></td>
                    </tr>
                    <tr>
                        <td>State: </td>
                        <td><select name="State" required>
                            <option selected disabled>Select One...</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Sex: </td>
                        <td><input type="radio" value="Male" name="Sex" required>Male
                         <input type="radio" value="Female" name="Sex" required>Female</td>
                    </tr>
                </table>
                <br><br>
                <input type="submit" name="Create" value="Create Me" style="font-size: large">
            </form>
        </div>
    </center>
</body>