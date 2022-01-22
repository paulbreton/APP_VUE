import axios from 'axios'

export async function fetchRoles() {
  try {
    const response = await axios.$get('/api/roles')
    console.log(response)
    return response
  } catch (err) {
        console.log(err)
  }
}