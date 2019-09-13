export const store = {
	mounted: async function getData() {
		axios.post('/documents/docdata').then(res => {
			console.log(res.data);
			this.transport_data = res.data;
		});
	},

	state: {
		transport_data: [],
	}
};