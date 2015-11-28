    //session are website/server base. must be before any html code and session can be used acrros diff pagee.
    //must have session_start() comand, to get the session variables started. 
    //session varaibles exprise once user closes the browser (mainly used as temp logoin session)
    
    //example
    session_start();
    $_SESSION['loginID'] = "LKAHLON";
    echo $_SESSION['loginID'];
    
    //cookies are used for longer session registertion. (user like stay logged in for longer time)
    //like session, must run before any html code. 
    //cookie does not require start() like session_start().
    
    //example -- first attribute is  cookie name, 2nd is value and 3rd the time attribute (how long to keep cookie alive)
    #setcookie("id","1234", time()+60*60*24);
    #echo $_COOKIE['id'];
    
    //to expire cookies, the time attribute is set with negative time.
    //example below will set the cookie hour in the past.
    #setcookie("id", "", time()-3600);
    #echo $_COOKIE['id'];
    
    //storing password w/ strong encryption... 
    // 1. no encryption at all, user password is store as plain txt in the db
    // 2. second option is know as -- "Hash", one way coding, it incode password in # and latters example: md5(password);
    #echo md5("password"); //example output: 5f4dcc3b5aa765d61d8327deb882cf99
    // 3. 3rd level is adding a another layor on top of "Hash" is known as salt.   
    #$salt="2k3k4jrfhi85hdkdjueljsr3"; //some random numbers
    #echo md5($salt."password"); //example output: a46b653ee1b88e0b62604d50bc77b621
    // 4. level for encryption, use unique value for salt for each user, where 3rd level $salt value is save for all.
    //example
    #echo md5(md5($userID['id'])."password");
