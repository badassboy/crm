from django.db import models


status_options = (('Active', 'active'), ('Inactive', 'inactive'))

# Create your models here.
class Inventory(models.Model):
    product = models.CharField(max_length=100)
    status = models.CharField(max_length=10, choices = status_options)
    quantity = models.IntegerField()
    price = models.CharField(max_length=200)
    category = models.CharField(max_length=100)

    def __str__(self):
        return self.product

class Services(models.Model):
    name = models.CharField(max_length=100)
    status = models.CharField(max_length=10, choices = status_options)
    duration = models.DurationField()
    base_price = models.CharField(max_length=10)
    location = models.CharField(max_length=100)
    description = models.CharField(max_length=200)

    def __str__(self):
        return self.Name

class Contact(models.Model):
    First_name = models.CharField(max_length=100)
    Middle_name = models.CharField(max_length=100, null=True, blank=True)
    Last_name = models.CharField(max_length=100)
    Company = models.CharField(max_length=100)
    Email = models.EmailField()
    Status = models.CharField(max_length=20, choices=status_options)
    Mobile = models.CharField(max_length=12)
    WhatsApp_line = models.CharField(max_length=12)
    location = models.CharField(max_length=100)
    Address = models.CharField(max_length=100)
    Customer_source = models.CharField(max_length=20)

    def __str__(self):
        return self.First_name + " " + self.Last_name

class Invoice(models.Model):
    Invoice_number = models.CharField(max_length=100)
    Customer_name = models.CharField(max_length=100)
    Item = models.CharField(max_length=100)
    Invoice_date = models.DateField()
    Payment_due = models.DateField()
    Valid_until = models.DateField()
    Amount = models.CharField(max_length=100)
    Total_amount = models.CharField(max_length=100)
    Balance_payment = models.CharField(max_length=100)
    Status = models.CharField(max_length=20, choices=(('Unpaid', 'paid'), ('Paid', 'paid'), ('Overdue', 'overdue')))
    Note = models.CharField(max_length=200)

class Leads(models.Model):
    Full_Name = models.CharField(max_length=100)
    Title = models.CharField(max_length=100)
    Phone = models.CharField(max_length=100)
    Email = models.EmailField()
    Company = models.CharField(max_length=100)
    Industry = models.CharField(max_length=100)
    Lead_source = models.CharField(max_length=100)
    Rating = models.CharField(max_length=100)

    def __str__(self):
        return self.Title

class Deals(models.Model):
    Deal_name = models.CharField(max_length=100)
    Contact_name = models.CharField(max_length=100)
    Type = models.CharField(max_length=100)
    Deal_source = models.CharField(max_length=100)
    Amount = models.CharField(max_length=100)
    Closing_date = models.DateField()
    Expected_revenue = models.CharField(max_length=100)
    Description = models.CharField(max_length=200)

    def __str__(self):
        return self.Deal_name

class Task(models.Model):
    Subject = models.CharField(max_length=100)
    Task_date = models.DateField()
    Assigned_to = models.CharField(max_length=100)
    starting_time = models.TimeField(max_length=100)
    Ending_time = models.TimeField(max_length=100)
    Total_duration = models.CharField(max_length=100)
    Status = models.CharField(max_length=100)
    Priority = models.CharField(max_length=100)
    Description = models.CharField(max_length=200)

    def __str__(self):
        return self.Subject
    
class Meeting(models.Model):
    Title = models.CharField(max_length=100)
    Service_Type = models.CharField(max_length=100)
    Location = models.CharField(max_length=100)
    Address = models.CharField(max_length=100)
    Assigned_To = models.CharField(max_length=100)
    Date = models.DateField()
    Start_time = models.TimeField()
    End_time = models.TimeField()
    Agenda = models.CharField(max_length=100)

    def __str__(self):
        return self.Title
    
class Calls(models.Model):
    Call_contact = models.CharField(max_length=100)
    Relation = models.CharField(max_length=100)
    Date = models.DateField()
    Time = models.TimeField()
    Subject = models.CharField(max_length=100)
    Reminder = models.CharField(max_length=100)
    Purpose = models.CharField(max_length=100)
    Agenda = models.CharField(max_length=100)