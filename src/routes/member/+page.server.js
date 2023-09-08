// export const actions = {
//     create: async ({ request }) => {
//         const data = await request.formData();
//         const datajson = {
//             name: data.get("name"),
//             surname: data.get("surname"),
//             email: data.get("email"),
//             password: data.get("password")
//         }
//         console.log(datajson);
//         const res = await fetch("https://fakestoreapi.com/products", {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json",
//             },
//             body: JSON.stringify(datajson),
//         });
//         const resjson = await res.json();
//         console.log(resjson);
//         return resjson;
//     }
// }

