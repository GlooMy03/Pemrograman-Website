<script setup>
import { ref, onMounted } from 'vue';
import api from '../../api';

const rooms = ref([]);
const loading = ref(true);
const error = ref(null);

const fetchRooms = async () => {
    try {
        loading.value = true;
        const response = await api.get('/api/rooms');
        console.log('API Response:', response);
        rooms.value = response.data;
    } catch (error) {
        console.error('Error detail:', error.response || error);
        error.value = 'Failed to fetch rooms';
    } finally {
        loading.value = false;
    }
};

const deleteRoom = async (id) => {
    if (!confirm('Are you sure you want to delete this room?')) return;
    
    try {
        await api.delete(`/api/rooms/${id}`);
        await fetchRooms();
    } catch (error) {
        console.error('Delete error:', error.response || error);
        alert('Failed to delete room');
    }
};

onMounted(() => {
    fetchRooms();
});
</script>

<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <router-link 
                    :to="{ name: 'rooms.create' }" 
                    class="btn btn-md btn-success rounded shadow border-0 mb-3">
                    ADD NEW ROOM
                </router-link>
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
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

                        <!-- Content -->
                        <table v-else class="table table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>#</th>
                                    <th>type</th>
                                    <th>description</th>
                                    <th style="width: 15%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="rooms.length === 0">
                                    <td colspan="7" class="text-center">
                                        <div class="alert alert-danger mb-0">
                                            No Rooms Available!
                                        </div>
                                    </td>
                                </tr>
                                <tr v-else v-for="(room, index) in rooms" :key="room.id">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ room.type }}</td>
                                    <td>{{ room.description }}</td>
                                    <td>
                                        <router-link 
                                            :to="{ name: 'rooms.edit', params: { id: room.id } }" 
                                            class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2">
                                            EDIT
                                        </router-link>
                                        <button 
                                            @click.prevent="deleteRoom(room.id)" 
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