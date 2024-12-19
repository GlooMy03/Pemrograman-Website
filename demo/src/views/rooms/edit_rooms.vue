<script setup>
import { ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import api from "../../api";

const router = useRouter();
const route = useRoute();
const errors = ref({});
const room = ref({
    type: "",
    description: ""
});

const fetchRoom = async () => {
    try {
        const response = await api.get(`/api/rooms/${route.params.id}`);
        room.value = response.data;
    } catch (error) {
        console.error("Error fetching room details:", error);
        alert("Failed to fetch room details!");
        router.push({ name: "rooms.index" });
    }
};

const updateRoom = async () => {
    try {
        const response = await api.put(`/api/rooms/${route.params.id}`, room.value);
        
        if (response.data) {
            alert("Room updated successfully!");
            router.push({ name: "rooms.index" });
        }
    } catch (error) {
        if (error.response?.data?.errors) {
            errors.value = error.response.data.errors;
        } else {
            console.error("Error updating room:", error);
            alert("Failed to update room!");
        }
    }
};

onMounted(() => {
    fetchRoom();
});
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4 class="mb-3">Edit Room</h4>
                        <form @submit.prevent="updateRoom">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Type</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="room.type"
                                    placeholder="Enter room type"
                                />
                                <div v-if="errors.type" class="alert alert-danger mt-2">
                                    {{ errors.type[0] }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea
                                    class="form-control"
                                    v-model="room.description"
                                    placeholder="Enter room description"
                                ></textarea>
                                <div v-if="errors.description" class="alert alert-danger mt-2">
                                    {{ errors.description[0] }}
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                <button type="button" @click="router.push({name: 'rooms.index'})" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
