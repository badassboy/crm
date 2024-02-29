from django.shortcuts import render
from .serializer import *
from .models import *
from rest_framework import status
from rest_framework.views import APIView
from rest_framework.response import Response

# Create your views here.


class InventoryList(APIView):
    def get(self, request):
        inventory = Inventory.objects.all()
        serializer = InventorySerializer(inventory, many=True)
        return Response(serializer.data, status=status.HTTP_200_OK)

    def post(self, request):
        serializer = InventorySerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors,status=status.HTTP_400_BAD_REQUEST)
    
class InventoryDetail(APIView):
    def get_object(self, product):
        try:
            return Inventory.objects.get(product=product)
        except Inventory.DoesNotExist:
            return Response(status=status.HTTP_404_NOT_FOUND)
    
    def get(self, request, product):
        inventory = self.get_object(product)
        serializer = InventorySerializer(inventory)
        return Response(serializer.data)
    
    def put(self, request, product):
        doctor = self.get_object(product)
        serializer = InventorySerializer(doctor, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
    
class ServicesList(APIView):
    def get(self, request):
        services = Services.objects.all()
        serializer = ServicesSerializer(services, many=True)
        return Response(serializer.data, status=status.HTTP_200_OK)

    def post(self, request):
        serializer = ServicesSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors,status=status.HTTP_400_BAD_REQUEST)
    
class ServicesDetail(APIView):
    def get_object(self, Name):
        try:
            return Services.objects.get(Name=Name)
        except Services.DoesNotExist:
            return Response(status=status.HTTP_404_NOT_FOUND)
    
    def get(self, request, Name):
        services = self.get_object(Name)
        serializer = ServicesSerializer(services)
        return Response(serializer.data)
    
    def put(self, request, Name):
        services = self.get_object(Name)
        serializer = ServicesSerializer(services, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
    
class ContactList(APIView):
    def get(self, request):
        contact = Contact.objects.all()
        serializer = ContactSerializer(contact, many=True)
        return Response(serializer.data, status=status.HTTP_200_OK)

    def post(self, request):
        serializer = ContactSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors,status=status.HTTP_400_BAD_REQUEST)
    
# class ContactDetail(APIView):
#     def get_object(self, Name):
#         try:
#             return Services.objects.get(Name=Name)
#         except Services.DoesNotExist:
#             return Response(status=status.HTTP_404_NOT_FOUND)
    
#     def get(self, request, Name):
#         services = self.get_object(Name)
#         serializer = ServicesSerializer(services)
#         return Response(serializer.data)
    
#     def put(self, request, Name):
#         services = self.get_object(Name)
#         serializer = ServicesSerializer(services, data=request.data)
#         if serializer.is_valid():
#             serializer.save()
#             return Response(serializer.data)
        
#         return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
    
class InvoiceList(APIView):
    def get(self, request):
        invoice = Invoice.objects.all()
        serializer = InvoiceSerializer(invoice, many=True)
        return Response(serializer.data, status=status.HTTP_200_OK)

    def post(self, request):
        serializer = InvoiceSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors,status=status.HTTP_400_BAD_REQUEST)
    
class InvoiceDetail(APIView):
    def get_object(self, Invoice_number):
        try:
            return Invoice.objects.get(Invoice_number=Invoice_number)
        except Invoice.DoesNotExist:
            return Response(status=status.HTTP_404_NOT_FOUND)
    
    def get(self, request, Invoice_number):
        invoice = self.get_object(Invoice_number)
        serializer = InvoiceSerializer(invoice)
        return Response(serializer.data)
    
    def put(self, request, Invoice_number):
        invoice = self.get_object(Invoice_number)
        serializer = InvoiceSerializer(invoice, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
    


class LeadsList(APIView):
    def get(self, request):
        leads = Leads.objects.all()
        serializer = LeadsSerializer(leads, many=True)
        return Response(serializer.data, status=status.HTTP_200_OK)

    def post(self, request):
        serializer = LeadsSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors,status=status.HTTP_400_BAD_REQUEST)
    
class LeadsDetail(APIView):
    def get_object(self, Title):
        try:
            return Leads.objects.get(Title=Title)
        except Leads.DoesNotExist:
            return Response(status=status.HTTP_404_NOT_FOUND)
    
    def get(self, request, Title):
        leads = self.get_object(Title)
        serializer = ServicesSerializer(leads)
        return Response(serializer.data)
    
    def put(self, request, Title):
        leads = self.get_object(Title)
        serializer = ServicesSerializer(leads, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
    
class DealsList(APIView):
    def get(self, request):
        services = Deals.objects.all()
        serializer = DealsSerializer(services, many=True)
        return Response(serializer.data, status=status.HTTP_200_OK)

    def post(self, request):
        serializer = DealsSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors,status=status.HTTP_400_BAD_REQUEST)
    
class DealDetail(APIView):
    def get_object(self, Deal_name):
        try:
            return Deals.objects.get(Deal_name=Deal_name)
        except Deals.DoesNotExist:
            return Response(status=status.HTTP_404_NOT_FOUND)
    
    def get(self, request, Deal_name):
        services = self.get_object(Deal_name)
        serializer = DealsSerializer(services)
        return Response(serializer.data)
    
    def put(self, request, Deal_name):
        services = self.get_object(Deal_name)
        serializer = DealsSerializer(services, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
    


class TaskList(APIView):
    def get(self, request):
        services = Task.objects.all()
        serializer = TaskSerializer(services, many=True)
        return Response(serializer.data, status=status.HTTP_200_OK)

    def post(self, request):
        serializer = TaskSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors,status=status.HTTP_400_BAD_REQUEST)
    
class TaskDetail(APIView):
    def get_object(self, Subject):
        try:
            return Task.objects.get(Subject=Subject)
        except Task.DoesNotExist:
            return Response(status=status.HTTP_404_NOT_FOUND)
    
    def get(self, request, Subject):
        services = self.get_object(Subject)
        serializer = TaskSerializer(services)
        return Response(serializer.data)
    
    def put(self, request, Subject):
        services = self.get_object(Subject)
        serializer = TaskSerializer(services, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
    

class MeetingList(APIView):
    def get(self, request):
        services = Meeting.objects.all()
        serializer = MeetingSerializer(services, many=True)
        return Response(serializer.data, status=status.HTTP_200_OK)

    def post(self, request):
        serializer = MeetingSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors,status=status.HTTP_400_BAD_REQUEST)
    
class MeetingDetail(APIView):
    def get_object(self, Title):
        try:
            return Meeting.objects.get(Title=Title)
        except Meeting.DoesNotExist:
            return Response(status=status.HTTP_404_NOT_FOUND)
    
    def get(self, request, Title):
        services = self.get_object(Title)
        serializer = MeetingSerializer(services)
        return Response(serializer.data)
    
    def put(self, request, Title):
        services = self.get_object(Title)
        serializer = MeetingSerializer(services, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
    
class CallList(APIView):
    def get(self, request):
        services = Calls.objects.all()
        serializer = CallsSerializer(services, many=True)
        return Response(serializer.data, status=status.HTTP_200_OK)

    def post(self, request):
        serializer = CallsSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        
        return Response(serializer.errors,status=status.HTTP_400_BAD_REQUEST)
    
class CallDetail(APIView):
    def get_object(self, Call_contact):
        try:
            return Calls.objects.get(Call_contact=Call_contact)
        except Calls.DoesNotExist:
            return Response(status=status.HTTP_404_NOT_FOUND)
    
    def get(self, request, Call_contact):
        services = self.get_object(Call_contact)
        serializer = CallsSerializer(services)
        return Response(serializer.data)
    
    def put(self, request, Call_contact):
        services = self.get_object(Call_contact)
        serializer = CallsSerializer(services, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data)
        
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)