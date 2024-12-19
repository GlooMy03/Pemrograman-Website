<script setup>
import { ref, onMounted } from 'vue';
import api from '../../api';

const bookings = ref([]);
const loading = ref(true);
const error = ref(null);

const fetchBookings = async () => {
    try {
        loading.value = true;
        const response = await api.get('/api/booking');
        console.log('API Response:', response); // untuk debugging
        bookings.value = response.data;
    } catch (error) {
        console.error('Error detail:', error.response || error);
        error.value = 'Failed to fetch bookings';
    } finally {
        loading.value = false;
    }
};

const deleteBooking = async (id) => {
    if (!confirm('Are you sure you want to delete this booking?')) return;
    
    try {
        await api.delete(`/api/booking/${id}`);
        await fetchBookings();
    } catch (error) {
        console.error('Delete error:', error.response || error);
        alert('Failed to delete booking');
    }
};

onMounted(() => {
    fetchBookings();
});
</script>


 
<template>
    <div class="container mt-5 mb-5">
            <!-- Loading state -->
            <div v-if="loading" class="text-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- Error state -->
        <div v-else-if="error" class="alert alert-danger">
            {{ error }}
        </div>
        <div class="row">
            <div class="col-md-12">
                <router-link 
                    :to="{ name: 'booking.create' }" 
                    class="btn btn-md btn-success rounded shadow border-0 mb-3">
                    ADD NEW BOOKING
                </router-link>
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Room Type</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Phone Number</th>
                                    <th>Total Rooms</th>
                                    <th>Payment Method</th>
                                    <th style="width: 15%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Jika data kosong -->
                                <tr v-if="bookings.length === 0">
                                    <td colspan="10" class="text-center">
                                        <div class="alert alert-danger mb-0">
                                            Data Belum Tersedia!
                                        </div>
                                    </td>
                                </tr>
                                <!-- Loop untuk render data -->
                                <tr v-else v-for="(booking, index) in bookings" :key="booking.id_booking">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ booking.full_name }}</td>
                                    <td>{{ booking.email }}</td>
                                    <td>{{ booking.room_type }}</td>
                                    <td>{{ booking.check_in }}</td>
                                    <td>{{ booking.check_out }}</td>
                                    <td>{{ booking.phone_number }}</td>
                                    <td>{{ booking.total_rooms }}</td>
                                    <td>{{ booking.payment_method }}</td>
                                    <td>
                                        <router-link 
                                            :to="{ name: 'booking.edit', params: { id: booking.id_booking } }" 
                                            class="btn btn-sm btn-primary">
                                            EDIT
                                        </router-link>
                                        <button 
                                            @click.prevent="deleteBooking(booking.id_booking)" 
                                            class="btn btn-sm btn-danger rounded-sm shadow border-0">
                                            DELETE
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
