function validate(form)
    {
        if (!document.bookingform.agree.checked)
            {
                alert ("You have to accept the booking terms and condition before proceed ")
                return false;
            }
            return true;
    }
