import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import swal from 'sweetalert2';

class Names extends Component{
    constructor(props){
        super(props);
        this.renderItem = this.renderItem.bind(this);
        this.handleChange = this.handleChange.bind(this);
        this.state = {
            items: [],
            data: {}
        };
    }
    renderItem(item, key) {
        return <tr key={key}>
            <td>{item.name}</td>
            <td className="text-right">
                <button type="button" className="btn btn-sm btn-danger" onClick={this.remove.bind(this, item)}>
                    <i className="fa fa-trash"></i> Revocar
                </button>
            </td>
        </tr>
    }

    remove(item){
        let self = this;
        swal.fire({
            title: "¿Deseas eliminar el el nombre?",
            text: "Estas seguro de eliminar el nombre, ¿Deseas continuar?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            showCancelButton: true,
        })
            .then((willDelete) => {
                if (willDelete.value) {
                    axios.delete('/api/names/' + item.id).then((response) => {
                        self.componentWillMount();
                        swal.fire({
                            icon: 'success',
                            text: response.data.Mensaje
                        });
                    });
                }
            });
    }

    handleChange(e){
        var target = e.target;
        var data = this.state.data;
        data[target.name] = target.value;
        this.setState({
            data: data
        });
    }

    componentWillMount() {
        let self = this;
        axios.get('/api/names').then((response) => {
            
            self.setState({
                items: response.data
            });
        });
    }

    create(){
        let self = this;
        axios.post('/api/names', this.state.data).then((response) => {
            console.log(response)
            swal.fire({
                icon: 'success',
                text: response.data.Mensaje
            });
            self.componentWillMount();
            $('#createModal').modal('hide');
        }); 
    }

    btnCrearnuevonombre(){
        $('#name').val('');	
        this.state.data = {}
        $('#createModal').modal('show');
    }

    render() {
        return <div>
            <div className="modal face" tabIndex="-1" role="dialog" id="createModal">
                <div className="modal-dialog" role="document">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title">Crear nuevo nombre</h5>
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div className="modal-body">
                            <div className="row">
                                <div className="col-12 form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="name" id="name" className="form-control" onChange={this.handleChange}/>
                                </div>
                            </div>
                        </div>
                        <div className="modal-footer">
                            <button type="button" className="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="button" className="btn btn-primary"
                                    onClick={this.create.bind(this)}
                                    disabled={!this.state.data.name}>Crear</button>
                        </div>
                    </div>
                </div>
            </div>
            <section className="content">
                <div className="card">
                    <div className="card-body">
                        <div className="box-header with-border" style={{marginBottom: '15px'}}>
                            <div className="col-12 text-right">
                                <a href="javascript:;" onClick={this.btnCrearnuevonombre.bind(this)}
                                   className="btn btn-success m-t-10">
                                    <i className="fa fa-plus p-r-10"></i>
                                    &nbsp; Crear nuevo nombre
                                </a>
                            </div>
                        </div>
                        <div className="box-body pt-3">
                            <table className="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                {this.state.items.map(this.renderItem)}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    }
}   

export default Names;

var element = document.getElementById('names-list');
//console.log(element,"entro al elemento");
if(element){
    ReactDOM.render(<Names/>, element);
}