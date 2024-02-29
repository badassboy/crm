from django.urls import path
from . import views

urlpatterns = [
    path('inventory/', views.InventoryList.as_view(), name="inventory_list"),
    path('inventory/<str:product>/', views.InventoryDetail.as_view(), name="inventory_detail"),
    path('services/', views.ServicesList.as_view(), name="services_list"),
    path('services/<str:name>/', views.InventoryDetail.as_view(), name="services_detail"),
    path('invoice/', views.InvoiceList.as_view(), name="invoice_list"),
    path('invoice/<str:Invoice_number>/', views.InvoiceDetail.as_view(), name="invoice_detail"),
    path('contact/', views.ContactList.as_view(), name="contact_list"),
    path('leads/', views.LeadsList.as_view(), name="leads_list"),
    path('leads/<str:Title>/', views.InventoryDetail.as_view(), name="leads_detail"),
    path('deals/', views.DealsList.as_view(), name="deal_list"),
    path('deals/<str:Deal_name>/', views.DealDetail.as_view(), name="deal_detail"),
    path('task/', views.TaskList.as_view(), name="task_list"),
    path('task/<str:Subject>/', views.TaskDetail.as_view(), name="deal_detail"),
    path('meeting/', views.MeetingList.as_view(), name="meeting_list"),
    path('meeting/<str:Title>/', views.MeetingDetail.as_view(), name="meeting_detail"),
    path('calls/', views.CallList.as_view(), name="call_list"),
    path('calls/<str:Call_contact>/', views.CallDetail.as_view(), name="call_detail"),
]
