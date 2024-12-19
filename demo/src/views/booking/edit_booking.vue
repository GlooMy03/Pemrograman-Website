<script setup>
import { ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import api from "../../api";

const router = useRouter();
const route = useRoute();

// Gunakan ref alih-alih reactive untuk tracking yang lebih baik
const booking = ref({
    full_name: "",
    email: "",
    room_type: "",
    check_in: "",
    check_out: "",
    phone_number: "",
    total_rooms: "",
    payment_method: ""
});

const errors = ref({});

// Perbaiki fetch booking dengan menambahkan error handling
const fetchBooking = async () => {
    try {
        console.log("Fetching booking with ID:", route.params.id); // Debug ID
        const response = await api.get(`/api/booking/${route.params.id}`);
        console.log("API Response:", response.data); // Debug response
        
        // Pastikan data ada sebelum assign
        if (response.data) {
            booking.value = response.data;
        }
    } catch (error) {
        console.error("Error detail:", error.response || error);
        alert("Failed to load booking data!");
    }
};

const updateBooking = async () => {
    try {
        const response = await api.put(`/api/booking/${route.params.id}`, booking.value);
        
        if (response.data) {
            alert("Booking updated successfully!");
            router.push({ name: "booking.index" });
        }
    } catch (error) {
        if (error.response?.data?.errors) {
            errors.value = error.response.data.errors;
        } else {
            console.error("Error updating:", error.response || error);
            alert("Failed to update booking!");
        }
    }
};

// Pastikan fetchBooking dipanggil saat komponen dimount
onMounted(() => {
    fetchBooking();
});
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4 class="mb-3">Edit Booking</h4>
                        
                        <!-- Tambahkan loading state -->
                        <div v-if="!booking.full_name" class="text-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        <form v-else @submit.prevent="updateBooking">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Full Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="booking.full_name"
                                    placeholder="Enter full name"
                                />
                                <div v-if="errors.full_name" class="alert alert-danger mt-2">
                                    <span>{{ errors.full_name[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    v-model="booking.email"
                                    placeholder="Enter email"
                                />
                                <div v-if="errors.email" class="alert alert-danger mt-2">
                                    <span>{{ errors.email[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Room Type</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="booking.room_type"
                                    placeholder="Enter room type"
                                />
                                <div v-if="errors.room_type" class="alert alert-danger mt-2">
                                    <span>{{ errors.room_type[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Check-in</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    v-model="booking.check_in"
                                />
                                <div v-if="errors.check_in" class="alert alert-danger mt-2">
                                    <span>{{ errors.check_in[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Check-out</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    v-model="booking.check_out"
                                />
                                <div v-if="errors.check_out" class="alert alert-danger mt-2">
                                    <span>{{ errors.check_out[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Phone Number</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="booking.phone_number"
                                    placeholder="Enter phone number"
                                />
                                <div v-if="errors.phone_number" class="alert alert-danger mt-2">
                                    <span>{{ errors.phone_number[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Total Rooms</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    v-model="booking.total_rooms"
                                    placeholder="Enter total rooms"
                                />
                                <div v-if="errors.total_rooms" class="alert alert-danger mt-2">
                                    <span>{{ errors.total_rooms[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Payment Method</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="booking.payment_method"
                                    placeholder="Enter payment method"
                                />
                                <div v-if="errors.payment_method" class="alert alert-danger mt-2">
                                    <span>{{ errors.payment_method[0] }}</span>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                <button type="button" @click="router.push({name: 'booking.index'})" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>