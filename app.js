let tbody = document.querySelector("tbody");
$("#itemDetail").hide();

const getItems = async () => {
  let res = await fetch("https://fakestoreapi.com/products");
  if (res.status === 200) {
    let data = await res.json();
    return data;
  }
};

getItems().then((data) => {
  let list = [];
  for (let i = 0; i < data.length; i++) {
    const item = data[i];
    list += `<tr onclick="showDeatil(${data[i].id})" class="dataRow">
      <td>${item.id}</td>
      <td>${item.title}</td>
      <td>${item.price}</td>
      <td>${item.rating.rate}</td>
      <td><img src="${item.image}" class="img-thumbnail" width="50"/></td>
    </tr>`;
  }
  tbody.innerHTML = list;
});

const showDeatil = async (id) => {
  let res = await fetch(`https://fakestoreapi.com/products/${id}`);
  let data = await res.json();
  if (data !== null) {
    if ($("#itemDetail").hasClass("active")) {
      $("#itemDetail").hide();
      $("#itemDetail").show(500);
    } else {
      $("#itemDetail").show(500);
      $("#itemDetail").addClass("active");
    }
    $("#itemDetail").html(`<div class="text-center mb-2">
    <img src="${data.image}" width="100px" alt="" />
  </div>
  <div>
    <p>Name - ${data.title}</p>
    <p>Price - ${data.price}</p>
    <p>Rating - ${data.rating.rate}</p>
  </div>
  <div>
    <button class="btn btn-sm btn-danger float-end" onclick="closeModal()">Close</button>
  </div>`);
  }
};

const closeModal = () => {
  $("#itemDetail").hide(500);
};
