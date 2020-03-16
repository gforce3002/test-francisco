import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import AdminHeader from "./AdminHeader";
import swal from 'sweetalert2';

export default class User extends Component {

    constructor(props) {
        super(props);
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.state = {
            data: {},
            roles: [],
            message: null
        };
    }

    componentWillMount() {
        let self = this;
        if (this.props.id) {
            axios.get('/api/user/' + this.props.id).then(({data}) => {
                self.setState({data: data});
            });
        }

        axios.get('/api/role').then(({data}) => {
            self.setState({roles: data});
        });
    }

    handleSubmit(e) {
        e.preventDefault();
        if (this.props.id) {
            axios.put('/api/user/' + this.props.id, this.state.data).then(({data}) => {
                swal.fire({
                    type: 'success',
                    text: 'Los cambios han sido guardados'
                }).then(() => {
                    location.href = '/users';
                });
            }).catch((error) => {
                if (error.response) {
                    swal.fire({
                        type: 'error',
                        text: 'Ha ocurrido un error al procesar la información, por favor vuelve a intentarlo.'
                    });
                }
            });
        } else {
            if (!this.state.data.password) {
                this.setState({
                    message: 'Debes escribir la contraseña'
                });
                return false;
            }

            axios.post('/api/user', this.state.data).then(({data}) => {
                swal.fire({
                    type: 'success',
                    text: 'Los cambios han sido guardados'
                }).then(() => {
                    location.href = '/users';
                });
            }).catch((error) => {
                if (error.response) {
                    if (error.response.status == 409) {
                        swal.fire({
                            type: 'error',
                            text: 'El usuario que intentas crear ya existe.'
                        });
                    } else {
                        swal.fire({
                            type: 'error',
                            text: 'Ha ocurrido un error al procesar la información, por favor vuelve a intentarlo.'
                        })
                    }
                }
            });
        }

    }

    handleChange({target}) {
        let data = this.state.data;
        data[target.name] = target.value;
        this.setState({data: data});
    }

    render() {
        return <div>
            <section className="content">
                <div className="card">
                    <div className="card-body">
                        <div className="box-header with-border">
                            <div className="col-12 text-right">
                                <a href={'/users'} className='btn btn-primary'>
                                    <i className="fa fa-arrow-left"></i> Regresar a Usuarios
                                </a>
                            </div>
                        </div>
                        <div className="box-body" style={{paddingTop: '20px'}}>
                            <form onSubmit={this.handleSubmit}>
                                <div className="col-xs-12 col-md-6">
                                    <h3>
                                        Datos del Usuario
                                    </h3>
                                    <div className="form-group">
                                        <label>Nombre:</label>
                                        <input type="text" className="form-control" name="name"
                                               onChange={this.handleChange} value={this.state.data.name} />
                                    </div>
                                    <div className="form-group">
                                        <label>Correo electrónico:</label>
                                        <input type="email" className="form-control" name="email"
                                               onChange={this.handleChange} value={this.state.data.email}
                                               disabled={this.props.id} />
                                    </div>
                                    <div className="form-group">
                                        <label>Contraseña:</label>
                                        <input type="password" className="form-control" name="password"
                                               onChange={this.handleChange} />
                                    </div>
                                    <div className="form-group">
                                        <label>Permisos:</label>
                                        <select className="form-control" name="role"
                                                onChange={this.handleChange}>
                                            <option  value={''} selected={this.state.data.role == null}>Usuario</option>
                                            {this.state.roles.map((item, key) => {
                                                return <option key={key}
                                                               selected={item.name == this.state.data.role}
                                                               value={item.name}>
                                                    {item.display_name}
                                                </option>
                                            })}
                                        </select>
                                    </div>
                                    {this.state.message?<div className="alert alert-danger">
                                        <div className="col-xs-12">
                                            {this.state.message}
                                        </div>
                                        <div className="clearfix"></div>
                                    </div>:''}
                                    <div className="form-group text-right">
                                        <button className="btn btn-success" disabled={!this.state.data.name ||
                                        !this.state.data.email} type="submit">
                                            <i className="fa fa-save"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    }
}

var element = document.getElementById('users-create');

if (element) {
    ReactDOM.render(<User/>, element);
}

var element = document.getElementById('user-get');

if (element) {
    ReactDOM.render(<User id={id}/>, element);
}