import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import AdminHeader from "./AdminHeader";

export default class Users extends Component {

    constructor(props) {
        super(props);
        this.renderItem = this.renderItem.bind(this);
        this.state = {
            items: []
        };
    }

    componentWillMount() {
        let self = this;
        axios.get('/api/user').then(({data}) => {
            self.setState({items: data});
        });
    }

    renderItem(item, key) {
        return <tr key={key}>
            <td>{item.id}</td>
            <td>{item.name}</td>
            <td>{item.email}</td>
            <td>{item.phone}</td>
            <td>{item.role}</td>
            <td className="text-right">
                <a href={'/users/' + item.id} className="btn btn-xs btn-primary">
                    <i className="fa fa-edit"></i> Editar
                </a>
            </td>
        </tr>
    }

    render() {
        return <div>
            <section className="content">
                <div className="card">
                    <div className="card-body">
                        <div className="box-header with-border" style={{marginBottom: '15px'}}>
                            <div className="col-12 text-right">
                                <a href={'/users/create'} className='btn btn-success'>
                                    <i className="fa fa-plus"></i> Registrar Usuario
                                </a>
                            </div>
                        </div>
                        <div className="box-body">
                            <div className="col-xs-12 pt-3">
                                <table className="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Correo electrónico</th>
                                            <th>Teléfono</th>
                                            <th>Rol</th>
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
                </div>
            </section>
        </div>
    }

}

var element = document.getElementById('users-container');

if (element) {
    ReactDOM.render(<Users/>, element);
}
