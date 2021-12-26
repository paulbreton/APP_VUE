
export async function fetchUsers(axios) {
  try {
    const response = await axios.get('/api/users')
    console.log(response.data)
    return response
  } catch (err) {
        console.log(err)
  }
}