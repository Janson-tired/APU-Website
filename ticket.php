<?php include 'includes/header.php'; ?>

<div class="header-and-logo">
    <h1>Buy Ticket</h1>
    <a href="index.php"><div class="logo"></div></a>
</div>

<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <form id="ticketForm">
            <div class="formbold-input-flex">
                <div>
                    <label for="firstname" class="formbold-form-label">First name</label>
                    <input type="text" name="firstname" id="firstname" class="formbold-form-input" required>
                </div>
                <div>
                    <label for="lastname" class="formbold-form-label">Last name</label>
                    <input type="text" name="lastname" id="lastname" class="formbold-form-input" required>
                </div>
            </div>

            <div class="formbold-input-flex">
                <div>
                    <label for="email" class="formbold-form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="formbold-form-input" required>
                </div>
            </div>

            <div class="formbold-input-flex">
                <div>
                    <label for="adultTickets" class="formbold-form-label">Adult Tickets</label>
                    <input type="number" name="adultTickets" id="adultTickets" class="formbold-form-input" min="1" value="1" required>
                </div>
                <div>
                    <label for="childTickets" class="formbold-form-label">Child Tickets</label>
                    <input type="number" name="childTickets" id="childTickets" class="formbold-form-input" min="0" value="0">
                </div>
            </div>

            <div class="formbold-form-btn-wrapper">
                <button type="submit" class="formbold-btn">
                    Purchase Tickets
                </button>
            </div>
        </form>
    </div>
</div>

<div id="confirmationMessage" style="display: none;">
    <h2>Purchase Successful!</h2>
    <p>Thank you for your purchase. Your tickets have been sent to your email.</p>
    <button onclick="resetForm()" class="formbold-btn">Purchase More Tickets</button>
</div>

<script>
document.getElementById('ticketForm').addEventListener('submit', function(e) {
    e.preventDefault();
    this.style.display = 'none';
    document.getElementById('confirmationMessage').style.display = 'block';
});

function resetForm() {
    document.getElementById('ticketForm').reset();
    document.getElementById('ticketForm').style.display = 'block';
    document.getElementById('confirmationMessage').style.display = 'none';
}
</script>

<?php include 'includes/footer.php';?>